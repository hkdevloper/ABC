<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DealResource\Pages;
use App\Filament\Resources\DealResource\RelationManagers;
use App\Models\Deal;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
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

class DealResource extends Resource
{
    protected static ?string $model = Deal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Management';
    protected static ?int $navigationSort = 5;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('is_active')
                    ->label('Is Active')
                    ->required(),
                Toggle::make('is_featured')
                    ->label('Is Featured')
                    ->required(),
                Select::make('user_id')
                    ->label('Select User')
                    ->relationship('user', 'name'),
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->withCount()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query){
                        return $query->where('type', 'deal');
                    }),
                TextInput::make('title')
                    ->label('Enter Title')
                    ->live(debounce: 500)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state){
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                }),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(191),
                TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                DateTimePicker::make('offer_start_date')->label('Offer Start'),
                DateTimePicker::make('offer_end_date')->label('Offer End'),

                Section::make('Discount Details')
                ->schema([
                    Select::make('discount_type')
                        ->label('Select Discount Type')
                        ->required()
                        ->options([
                            'percentage' => 'Percentage',
                            'fixed' => 'Fixed',
                        ])
                        ->default('percentage'),
                    TextInput::make('discount_value')
                        ->label('Discount Value')
                        ->required()
                        ->maxLength(191),
                    TextInput::make('discount_code')
                        ->label('Discount Code')
                        ->required()
                        ->maxLength(191),
                ])->columns(3),
                Forms\Components\RichEditor::make('terms_and_conditions')
                    ->columnSpanFull(),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->label('Meta Title')
                            ->required()
                            ->default(function (Forms\Get $get) {
                                return $get('title');
                            })
                            ->maxLength(191),
                        TextInput::make('meta_description')
                            ->label('Meta Description')
                            ->maxLength(300),
                        TagsInput::make('meta_keywords')->label('Meta Keywords'),

                    ])->columns(3),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('offer_start_date')
                    ->label('Offer Start')
                    ->dateTime('M d, Y h:i A')
                    ->sortable(),
                Tables\Columns\TextColumn::make('offer_end_date')
                    ->label('Offer End')
                    ->dateTime('M d, Y h:i A')
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount_type')
                    ->label('Type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_value')
                    ->label('Value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_code')
                    ->label('Code')
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListDeals::route('/'),
            'create' => Pages\CreateDeal::route('/create'),
            'edit' => Pages\EditDeal::route('/{record}/edit'),
        ];
    }
}
