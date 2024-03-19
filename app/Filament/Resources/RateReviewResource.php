<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RateReviewResource\Pages;
use App\Filament\Resources\RateReviewResource\RelationManagers;
use App\Models\RateReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use IbrahimBougaoua\FilamentRatingStar\Columns\RatingStarColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RateReviewResource extends Resource
{
    protected static ?string $model = RateReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->native(false)
                    ->required(),
                Forms\Components\Hidden::make('type')
                    ->required()
                    ->default('product'),
                Forms\Components\Hidden::make('item_id')
                    ->required(),
                RatingStar::make('rating')
                    ->label('Rating'),
                Forms\Components\Textarea::make('review')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_approved')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                RatingStarColumn::make('rating'),
                Tables\Columns\TextColumn::make('review')
                    ->wrap()
                    ->html()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_approved')
                    ->boolean(),
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
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make()
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListRateReviews::route('/'),
//            'create' => Pages\CreateRateReview::route('/create'),
            'edit' => Pages\EditRateReview::route('/{record}/edit'),
        ];
    }
}
