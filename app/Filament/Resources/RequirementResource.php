<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\RequirementResource\Pages;
use App\Filament\Resources\RequirementResource\RelationManagers;
use App\Models\Requirement;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequirementResource extends Resource
{
    protected static ?string $model = Requirement::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject')
                    ->label('Enter Subject')

                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('customer_name')
                    ->label('Enter Customer Name')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('email')
                    ->label('Enter Email')
                    ->required()
                    ->email()
                    ->maxLength(191),
                Forms\Components\TextInput::make('phone')
                    ->label('Enter Phone')
                    ->required()
                    ->tel()
                    ->maxLength(191),
                Forms\Components\TextInput::make('country')
                    ->label('Country')
                    ->required()
                    ->maxLength(191)
                    ->default(0),
                Forms\Components\Select::make('status')
                    ->label('Select Status')
                    ->options(Requirement::$statusList)
                    ->native(false)
                    ->required(),
                FileUpload::make('images')
                    ->label('Images')
                    ->directory('requirements')
                    ->maxFiles(3)
                    ->multiple(),
                TinyEditor::make('description')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('editor/uploads')
                    ->profile('custom')
                    ->columnSpan('full')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Accepted' => 'primary',
                        'Rejected' => 'danger',
                        'Completed' => 'success',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('Accept')
                        ->hidden(function (Requirement $requirement) {
                            return $requirement->status !== 'pending' || $requirement->status === 'accepted';
                        })
                        ->icon('heroicon-o-check-circle')
                        ->model(Requirement::class)
                        ->action(function (Requirement $requirement) {
                            $requirement->update(['status' => 'accepted']);
                        }),
                    Tables\Actions\Action::make('Reject')
                        ->hidden(function (Requirement $requirement) {
                            return $requirement->status !== 'pending' || $requirement->status === 'rejected';
                        })
                        ->icon('heroicon-o-x-circle')
                        ->model(Requirement::class)
                        ->action(function (Requirement $requirement) {
                            $requirement->update(['status' => 'rejected']);
                        }),
                    Tables\Actions\Action::make('Complete')
                        ->hidden(function (Requirement $requirement) {
                            return $requirement->status !== 'accepted' || $requirement->status === 'completed';
                        })
                        ->icon('heroicon-o-check-circle')
                        ->model(Requirement::class)
                        ->action(function (Requirement $requirement) {
                            $requirement->update(['status' => 'completed']);
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No Requirements yet')
            ->emptyStateDescription('Enjoy your day!')
            ->emptyStateActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRequirements::route('/'),
            'create' => Pages\CreateRequirement::route('/create'),
            'edit' => Pages\EditRequirement::route('/{record}/edit'),
        ];
    }
}
