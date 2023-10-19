<?php

namespace App\Filament\User\Pages;

use App\Models\City;
use App\Models\Company;
use App\Models\State;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Actions\Action;
use Filament\Pages\Page;
use Illuminate\Support\Collection;
use Str;

class CompanyProfileSetup extends Page implements HasForms
{
    protected static ?string $title = 'Company Profile';
    protected static string $model = \App\Models\Company::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static string $view = 'filament.user.pages.company-profile-setup';

    public $is_approved;
    public $is_claimed;
    public $is_active;
    public $is_featured;
    public $user_id;
    public $category_id;
    public $seo_id;
    public $name;
    public $description;
    public $extra_things;
    public $logo;
    public $gallery;
    public $phone;
    public $email;
    public $website;
    public $facebook;
    public $twitter;
    public $instagram;
    public $linkdin;
    public $youtube;


    protected $rules = [
        'is_approved' => ['required', 'boolean'],
        'is_claimed' => ['required', 'boolean'],
        'is_active' => ['required', 'boolean'],
        'is_featured' => ['required', 'boolean'],
        'user_id' => ['required', 'integer'],
        'category_id' => ['required', 'integer'],
        'seo_id' => ['required', 'integer'],
        'name' => ['required', 'string'],
        'slug' => ['required', 'string'],
        'description' => ['required', 'string'],
        'extra_things' => ['required', 'array'],
        'logo' => ['required', 'string'],
        'gallery' => ['required', 'array'],
        'phone' => ['required', 'string'],
        'email' => ['required', 'string'],
        'website' => ['required', 'string'],
        'facebook' => ['required', 'string'],
        'twitter' => ['required', 'string'],
        'instagram' => ['required', 'string'],
        'linkdin' => ['required', 'string'],
        'youtube' => ['required', 'string'],
    ];

    protected function getFormSchema(): array
    {
        return [

            Section::make('Company Details')->schema([
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->withCount()
                    ->emptyLabel('Oops! No Category Found')
                    ->model(Company::class)
                    ->relationship('category', 'name', 'parent_id', function ($query){
                        return $query->where('type', 'company');
                    }),
                TextInput::make('name')
                    ->label('Enter Company Name')
                    ->live(debounce: 500)
                    ->required()
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state){
                        $set('seo.title', $state);
                    }),
                TextInput::make('slug')
                    ->label('Enter Company Slug')
                    ->required()
                    ->maxLength(191),
                TagsInput::make('extra_things')
                    ->label('Extra Things')
                    ->required(),
            ])->columns(),
            RichEditor::make('description')
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
            Section::make('Other Details')
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
            ])->columns(3),
            Section::make('Address')
                ->model(Company::class)
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
                        ->live()
                        ->relationship('country', 'name')
                        ->default(101)
                        ->searchable()
                        ->required(),
                    Select::make('state_id')
                        ->label('Select State')
                        ->live()
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
                ])->columns(4),
            Section::make('SEO Details')
                ->model(Company::class)
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
        ];
    }

    public function submit(): void
    {
        $this->validate();
    }

}
