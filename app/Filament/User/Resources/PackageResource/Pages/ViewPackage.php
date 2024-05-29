<?php

namespace App\Filament\User\Resources\PackageResource\Pages;

use App\Filament\User\Resources\PackageResource;
use App\Models\PackageUser;
use App\Models\User;
use App\Models\WalletHistory;
use Exception;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewPackage extends ViewRecord
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Action Button to purchase the package
            Actions\Action::make('Purchase')
                ->icon('heroicon-o-shopping-cart')
                ->requiresConfirmation()
                ->modalHeading('Purchase Package')
                ->modalIcon('heroicon-o-shopping-cart')
                ->modalDescription(fn($record) => 'Are you sure you\'d like to purchase this package?, amount to be paid is ' . $record->price . '/' . $record->duration_type . '.' . ' amount will be deducted from your wallet balance.')
                ->modalSubmitActionLabel('Yes, Purchase')
                ->action(function ($record) {
                    try {
                        $user = User::findOrFail(auth()->id());
                        // Check user balance before purchasing the package
                        if ($user->balance < $record->price) {
                            return Notification::make()
                                ->danger()
                                ->title('Insufficient Balance')
                                ->body('You do not have sufficient balance to purchase this package, please add balance to your wallet.')
                                ->send();
                        }
                        $user->balance -= $record->price;
                        $user->save();
                        $user->packages()->attach($record->id);
                        // Find the package user record and update the details
                        $packageUser = PackageUser::where('user_id', $user->id)->where('package_id', $record->id)->where('is_expired', false)->where('is_active', true)->first();
                        $packageUser->is_active = true;
                        $packageUser->started_at = now();
                        $packageUser->expired_at = now()->add($record->duration . ' ' . $record->duration_type);
                        $packageUser->purchased_price = $record->price;
                        $packageUser->featured = $record->featured;
                        $packageUser->saveOrFail();
                        // Store the transaction in the database
                        $transaction = new WalletHistory();
                        $transaction->user_id = $user->id;
                        $transaction->type = 'debit';
                        $transaction->transaction_id = 'TXN-' . time();
                        $transaction->amount = $record->price;
                        $transaction->status = $user->balance < 0 ? 'failed' : 'captured';
                        $transaction->method = 'wallet';
                        $transaction->currency = $user->currency??'USD';
                        $transaction->user_email = $user->email;
                        $transaction->contact = $user->company ? $user->company->phone : 'N/A';
                        $transaction->fee = 0;
                        $transaction->tax = 0;
                        $transaction->json_response = json_encode(['message' => 'User purchased package ' . $record->name . ' for ' . $record->price . '/' . $record->duration_type . '.']);
                        $transaction->saveOrFail();

                        // TODO: Send email to user

                        return Notification::make()
                            ->success()
                            ->title('Package Purchased')
                            ->body('You have successfully purchased the package, you can now access the features of the package.')
                            ->send();
                    } catch (Exception $e) {
                        return Notification::make()
                            ->danger()
                            ->title('Error')
                            //->body('An error occurred while purchasing the package, please try again later.')
                            ->body($e->getMessage())
                            ->send();
                    }
                })
                ->visible(function($record){
                    $user = User::findOrFail(auth()->id());
                    // Check if user already has the package and is active
                    $packageUser = PackageUser::where('user_id', $user->id)->where('package_id', $record->id)->where('is_expired', false)->where('is_active', true)->first();
                    if($packageUser){
                        return false;
                    }
                    return $user->balance >= $record->price;
                }),
        ];
    }
}
