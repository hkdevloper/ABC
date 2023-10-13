<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\JobResource\Pages;
use App\Filament\User\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Str;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->required()
                    ->relationship('category', 'name'),
                TextInput::make('title')
                    ->label('Job Title')
                    ->placeholder('Enter job title')
                    ->live(debounce: 500)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug')
                    ->placeholder('Enter slug')
                    ->required()
                    ->maxLength(191),
                TextInput::make('summary')
                    ->label('Summary')
                    ->placeholder('Enter summary')
                    ->maxLength(191),
                TextInput::make('website')
                    ->label('Website')
                    ->placeholder('Enter website')
                    ->prefix('https://')
                    ->maxLength(191),
                DateTimePicker::make('valid_until')
                    ->label('Valid Until')
                    ->prefixIcon('heroicon-o-calendar')
                    ->default(now()->addDay()),
                TextInput::make('employment_type')
                    ->label('Employment Type')
                    ->placeholder('Enter employment type')
                    ->maxLength(191),
                TextInput::make('salary')
                    ->label('Salary')
                    ->placeholder('Enter salary')
                    ->prefixIcon('heroicon-o-currency-dollar')
                    ->maxLength(191),
                TextInput::make('organization')
                    ->label('Organization')
                    ->placeholder('Enter organization')
                    ->maxLength(191),
                Section::make()
            ->schema([
                RichEditor::make('description')
                    ->maxLength(65535),
                RichEditor::make('overview')
                    ->maxLength(65535),
                RichEditor::make('education')
                    ->maxLength(65535),
                RichEditor::make('experience')
                    ->maxLength(65535),
            ])->columns(2),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->directory('events/thumbnail')
                            ->required(),
                        FileUpload::make('gallery')
                            ->label('Gallery')
                            ->directory('events/gallery')
                            ->multiple(),
                    ])->columns(2),
                Section::make('Address Details')
                    ->relationship('address')
                    ->schema([
                        TextInput::make('address_line_1')
                            ->label('Address Line 1')
                            ->placeholder('Enter address line 1')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('address_line_2')
                            ->label('Address Line 2')
                            ->placeholder('Enter address line 2')
                            ->required()
                            ->maxLength(191),
                        Select::make('country_id')
                            ->label('Country')
                            ->relationship('country', 'name')
                            ->required(),
                        Select::make('state_id')
                            ->label('State')
                            ->relationship('state', 'name')
                            ->required(),
                        Select::make('city_id')
                            ->label('City')
                            ->relationship('city', 'name')
                            ->required(),
                        TextInput::make('zip_code')
                            ->label('Zip Code')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('longitude')
                            ->label('Longitude')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('latitude')
                            ->label('Latitude')
                            ->required()
                            ->maxLength(191),
                    ])->columns(4),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->label('SEO Title')
                            ->placeholder('Enter title')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('meta_description')
                            ->label('Meta Description')
                            ->maxLength(300),
                        TagsInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->placeholder('Enter keywords')
                            ->required(),
                    ])->columns(3),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('seo.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('summary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('valid_until')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employment_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salary')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
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
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make()
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('user_id', auth()->user()->id);
            });
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
