<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\CompanyResource\Pages;
use App\Models\Company;
use App\Models\State;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Str;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;
    protected static ?string $modelLabel = 'Company Profile';

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
                ])
                    ->native(false)
                    ->required(),
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->enableBranchNode()
                    ->withCount()
                    ->required()
                    ->enableBranchNode()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query) {
                        return $query->where('type', 'company');
                    }),
                TextInput::make('name')
                    ->label('Enter Company Name')
                    ->live(onBlur: true)
                    ->required()
                    ->autofocus()
                    ->unique(ignoreRecord: true)
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                    }),
                TextInput::make('slug')
                    ->label('Enter Company Slug')
                    ->hidden()
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(70),
                Forms\Components\DatePicker::make('established_at')
                    ->label('Established On')
                    ->default(now()),
                TextInput::make('number_of_employees')
                    ->label('Number of Employees')
                    ->default(1)
                    ->maxLength(191),
                TextInput::make('turnover')
                    ->label('Turnover')
                    ->default(0)
                    ->maxLength(191),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->autofocus()
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
                TagsInput::make('extra_things')
                    ->label('Products Name')
                    ->splitKeys(['Tab', ','])
                    ->helperText('List your products name separated by comma')
                    ->autofocus()
                    ->required(),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->optimize('webp')
                            ->resize(50)
                            ->label('Logo')
                            ->directory('companies/logo')
                            ->autofocus()
                            ->required(),
                        FileUpload::make('banner')
                            ->image()
                            ->optimize('webp')
                            ->resize(50)
                            ->label('Banner')
                            ->hidden()
                            ->directory('companies/banner'),
                        FileUpload::make('gallery')
                            ->image()
                            ->optimize('webp')
                            ->resize(50)
                            ->label('Gallery')
                            ->helperText('Add your company photos, Certificates etc')
                            ->directory('companies/gallery')
                            ->maxFiles(5)
                            ->autofocus()
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
                            ->preload()
                            ->live(onBlur: true)
                            ->relationship('country', 'name')
                            ->searchable()
                            ->required(),
                        Select::make('state_id')
                            ->label('State')
                            ->options(fn(Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        TextInput::make('city')
                            ->label('City')
                            ->autofocus()
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
                            ->autofocus()
                            ->maxLength(191),
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->autofocus()
                            ->maxLength(191),
                        TextInput::make('website')
                            ->label('Website')
                            ->maxLength(191),
                    ])->columns(1),
                Section::make('SEO Details')
                    ->relationship('seo')
                    ->schema([
                        TextInput::make('title')
                            ->label('Enter SEO Title')
                            ->required()
                            ->maxLength(70),
                        TagsInput::make('meta_keywords')
                            ->splitKeys(['Tab', ','])
                            ->label('Enter SEO Meta Keywords'),
                        Textarea::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->rows(5)
                            ->maxLength(160),
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
            'index' => Pages\CreateCompany::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
            'view' => Pages\ViewCompany::route('/{record}'),
        ];
    }
}


