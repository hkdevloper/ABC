<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\CompanyResource\Pages;
use App\Forms\Components\LeafletMap;
use App\Models\City;
use App\Models\Company;
use App\Models\State;
use App\Models\User;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
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
    protected static ?string $navigationGroup = 'Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('is_approved')
                    ->label('Approved')
                    ->default(true)
                    ->required(),
                Toggle::make('is_claimed')
                    ->default(function (Get $get, $action){
                        if ($action == 'edit') {
                            if ($get('claimed_by') == null) {
                                return false;
                            } else {
                                return true;
                            }
                        }
                        return false;
                    })
                    ->label('Claimed')
                    ->live(onBlur: true),
                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->required(),
                Toggle::make('is_featured')
                    ->label('Featured')
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),
                Select::make('claimed_by')
                    ->default(1)
                    ->disabled(fn(Get $get) => !$get('is_claimed'))
                    ->label('Claimed By')
                    ->options(fn(Get $get): Collection => User::query()
                        ->where('is_approved', 1)
                        ->where('is_banned', 0)
                        ->pluck('name', 'id'))
                    ->relationship('user', 'name'),
                Select::make('business_type')->options([
                    'manufacturer' => 'Manufacturer',
                    'distributor' => 'Distributor',
                    'retailer' => 'Retailer',
                ])
                    ->native(false)
                    ->label('Select Business Type')
                    ->required(),
                SelectTree::make('category_id')
                    ->label('Select Category')
                    ->enableBranchNode()
                    ->withCount()
                    ->emptyLabel('Oops! No Category Found')
                    ->relationship('category', 'name', 'parent_id', function ($query) {
                        return $query->where('type', 'company');
                    }),
                TextInput::make('name')
                    ->label('Enter Company Name')
                    ->live(onBlur: true)
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(191)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $set('slug', Str::slug($state));
                        $set('seo.title', $state);
                    }),
                TagsInput::make('extra_things')
                    ->label('Products Name')
                    ->splitKeys(['Tab', ' ', ','])
                    ->helperText('List your products name separated by comma')
                    ->required(),
                TextInput::make('slug')
                    ->label('Enter Company Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->live(onBlur: true)
                    ->maxLength(191),
                TinyEditor::make('description')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->fileAttachmentsDirectory('editor/uploads')
                    ->profile('custom')
                    ->columnSpan('full')
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
                            ->maxFiles(4)
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
                        TextInput::make('city')
                            ->label('City')
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
                            ->splitKeys(['Tab', ' ', ','])
                            ->label('Enter SEO Meta Keywords'),
                        TextInput::make('meta_description')
                            ->label('Enter SEO Meta Description')
                            ->maxLength(70),
                    ])->columns(1),
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_approved')->label('Approved'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Active'),
                Tables\Columns\ToggleColumn::make('is_featured')->label('Featured'),
                Tables\Columns\TextColumn::make('website')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('twitter')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('linkdin')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('youtube')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                // filters for status
                Tables\Filters\Filter::make('is_approved')
                    ->label('Approved')
                    ->modifyQueryUsing(function (Builder $query) {
                        $query->where('is_approved', 1);
                    }),
                Tables\Filters\Filter::make('is_active')
                    ->label('Active')
                    ->modifyQueryUsing(function (Builder $query) {
                        $query->where('is_active', 1);
                    }),
                Tables\Filters\Filter::make('is_featured')
                    ->label('Featured')
                    ->modifyQueryUsing(function (Builder $query) {
                        $query->where('is_featured', 1);
                    }),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
