<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\RequirementsResource\Pages;
use App\Models\Requirement;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequirementsResource extends Resource
{
    protected static ?string $model = Requirement::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

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
                    ->default('India'),
                Forms\Components\Select::make('status')
                    ->label('Select Status')
                    ->options(Requirement::$statusList)
                    ->native(false)
                    ->default('Pending')
                    ->disabled()
                    ->required(),
                FileUpload::make('images')
                    ->image()
                    ->optimize('webp')
                    ->resize(50)
                    ->label('Images')
                    ->directory('requirements')
                    ->maxFiles(3)
                    ->multiple(),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_name')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->wrap()
                    ->words(20)
                    ->lineClamp(5)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Posted On')
                    ->since()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\ActionGroup::make([
//                    Tables\Actions\ViewAction::make(),
//                ]),
            ])
            ->bulkActions([
                //
            ])
            ->modifyQueryUsing(function (Builder $query){
                $query->where('status', 'Approved');
            })
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
        ];
    }
}
