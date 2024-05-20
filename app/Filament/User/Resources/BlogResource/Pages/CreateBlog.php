<?php

namespace App\Filament\User\Resources\BlogResource\Pages;

use App\Filament\User\Resources\BlogResource;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;
use Str;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;
    protected static bool $canCreateAnother = false;
    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Send Notification to Admin when a new blog is created
        Notification::make()
            ->title('New Blog Created.')
            ->body(Str::limit($data['title'], 70, '...'))
            ->actions([
                Actions\Action::make('view')
                    ->url('/user/blogs'),
            ])
            ->sendToDatabase(User::find(1));
        return array_merge($data, [
            'company_id' => auth()->user()->company->id,
            'slug' => Str::slug($data['title']),
        ]);
    }

}
