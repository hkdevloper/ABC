<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\CompanyResource\Pages;
use App\Filament\User\Resources\CompanyResource\RelationManagers;
use App\Forms\Components\LeafletMap;
use App\Models\City;
use App\Models\Company;
use App\Models\State;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Str;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(auth()->user()->id),
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->enableBranchNode()
                    ->withCount()
                    ->enableBranchNode()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query){
                        return $query->where('type', 'company');
                    }),
                TextInput::make('name')
                    ->label('Enter Company Name')
                    ->live(onBlur: true)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state){
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                    }),
                TextInput::make('slug')
                    ->label('Enter Company Slug')
                    ->required()
                    ->maxLength(191),
                TagsInput::make('extra_things')
                    ->label('Extra Things')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('logo')
                            ->directory('companies/logo')
                            ->required(),
                        FileUpload::make('gallery')
                            ->directory('companies/gallery')
                            ->multiple(),
                    ])->columns(2),
                TextInput::make('phone')
                    ->label('Phone Number')
                    ->tel()
                    ->maxLength(191),
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->maxLength(191),
                TextInput::make('website')
                    ->label('Website')
                    ->maxLength(191),
                TextInput::make('facebook')
                    ->label('Facebook')
                    ->maxLength(191),
                TextInput::make('twitter')
                    ->label('Twitter')
                    ->maxLength(191),
                TextInput::make('instagram')
                    ->label('Instagram')
                    ->maxLength(191),
                TextInput::make('linkdin')
                    ->label('Linkdin')
                    ->maxLength(191),
                TextInput::make('youtube')
                    ->label('Youtube')
                    ->maxLength(191),
                Section::make('Address')
                    ->relationship('address')
                    ->schema([
                        TextInput::make('address_line_1')
                            ->label('Address Line 1')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('address_line_2')
                            ->label('Address Line 2')
                            ->required()
                            ->maxLength(191),
                        Select::make('country_id')
                            ->label('Select Country')
                            ->live(onBlur: true)
                            ->relationship('country', 'name')
                            ->default(101)
                            ->searchable()
                            ->required(),
                        Select::make('state_id')
                            ->label('Select State')
                            ->live(onBlur: true)
                            ->options(fn (Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Select::make('city_id')
                            ->label('Select City')
                            ->options(fn (Get $get): Collection => City::query()
                                ->where('state_id', $get('state_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
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
                        LeafletMap::make('location')
                            ->dehydrated(false)
                            ->columnSpanFull(),
                    ])->columns(4),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->label('Enter SEO Title')
                            ->required()
                            ->maxLength(191),
                        TextInput::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->maxLength(70),
                        TagsInput::make('meta_keywords')
                            ->label('Enter SEO Meta Keywords'),
                    ])->columns(3),
            ])->columns(4);
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
            'view' => Pages\ViewCompany::route('/{record}'),
        ];
    }
}


