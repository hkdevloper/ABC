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
                Select::make('business_type')->options([
                    'manufacturer' => 'Manufacturer',
                    'distributor' => 'Distributor',
                    'retailer' => 'Retailer',
                ])->required(),
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->enableBranchNode()
                    ->withCount()
                    ->enableBranchNode()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query) {
                        return $query->where('type', 'company');
                    }),
                TextInput::make('name')
                    ->label('Enter Company Name')
                    ->live(onBlur: true)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                    }),
                TextInput::make('slug')
                    ->label('Enter Company Slug')
                    ->required()
                    ->maxLength(191),
                Forms\Components\MarkdownEditor::make('description')
                    ->default('')
                    ->columnSpanFull(),
                TextInput::make('extra_things')
                    ->label('Products Name')
                    ->helperText('Enter your Products Name Seperated By Comma.')
                    ->required(),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Logo')
                            ->directory('companies/logo')
                            ->required(),
                        FileUpload::make('banner')
                            ->label('Banner')
                            ->directory('companies/banner'),
                        FileUpload::make('gallery')
                            ->label('Gallery')
                            ->helperText('Add your company photos, Certificates etc')
                            ->directory('companies/gallery')
                            ->maxFiles(5)
                            ->multiple(),
                    ])->columns(1),
                Section::make('Social Details')
                    ->schema([
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
                    ])->columns(1),
                Section::make('Address Details')
                    ->relationship('address')
                    ->schema([
                        Select::make('country_id')
                            ->label('Country')
                            ->live(onBlur: true)
                            ->relationship('country', 'name')
                            ->default(101)
                            ->searchable()
                            ->required(),
                        Select::make('state_id')
                            ->label('State')
                            ->live(onBlur: true)
                            ->options(fn(Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Select::make('city_id')
                            ->label('City')
                            ->options(fn(Get $get): Collection => City::query()
                                ->where('state_id', $get('state_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        TextInput::make('zip_code')
                            ->label('Zip Code')
                            ->required()
                            ->maxLength(191),
                        Forms\Components\Textarea::make('address_line_1')
                            ->label('Address Line 1')
                            ->placeholder('Enter address line 1')
                            ->required()
                            ->maxLength(191),
                    ])->columns(1),
                Section::make('Contact Details')
                    ->schema([
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
                            ->url()
                            ->maxLength(191),
                    ])->columns(1),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->label('Enter SEO Title')
                            ->required()
                            ->maxLength(191),
                        TagsInput::make('meta_keywords')
                            ->label('Enter SEO Meta Keywords'),
                        TextInput::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->maxLength(70),
                    ])->columns(1),
            ])->columns(1);
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


