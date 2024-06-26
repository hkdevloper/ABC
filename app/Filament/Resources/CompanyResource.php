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
use Filament\Actions\ReplicateAction;
use Filament\Actions\ViewAction;
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
use Illuminate\Support\Str;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?int $navigationSort = 1;
    protected static bool $isLazy = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),
                Section::make('')->schema([
                    Toggle::make('is_approved')
                        ->label('Approved')
                        ->default(true)
                        ->required(),
                    Toggle::make('is_claimed')
                        ->default(function ($record) {
                            return (bool)$record ? $record->claimed_by ? 1 : 0 : 0;
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
                    Toggle::make('is_rejected')
                        ->label('Rejected')
                        ->live()
                        ->default(false),
                ])->columns(5)->columnSpanFull(),
                Forms\Components\Group::make([
                    Select::make('claimed_by')
                        ->default(1)
                        ->native(false)
                        ->hidden(fn(Get $get) => !$get('is_claimed'))
                        ->disabled(fn(Get $get) => !$get('is_claimed'))
                        ->label('Claimed By')
                        ->options(fn(Get $get): Collection => User::query()
                            ->where('is_approved', 1)
                            ->where('is_banned', 0)
                            ->pluck('name', 'id'))
                        ->relationship('user', 'name'),

                    TextInput::make('rejected_reason')
                        ->label('Rejected Reason')
                        ->autofocus()
                        ->helperText('Enter the reason for rejection')
                        ->hidden(fn(Get $get) => !$get('is_rejected'))
                        ->disabled(fn(Get $get) => !$get('is_rejected'))
                        ->requiredIf('is_rejected', true)
                        ->maxLength(191),

                    TextInput::make('name')
                        ->label('Enter Company Name')
                        ->live(onBlur: true)
                        ->required()
                        ->autofocus()
                        ->maxLength(191)
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            $set('slug', Str::slug($state));
                            $set('seo.title', $state);
                        }),

                    TextInput::make('slug')
                        ->label('Enter Company Slug')
                        ->unique(ignoreRecord: true)
                        ->required()
                        ->autofocus()
                        ->unique(ignoreRecord: true)
                        ->live(onBlur: true)
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
                ])->columnSpan(2),
                Forms\Components\Group::make([
                    Select::make('business_type')
                        ->options([
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
                        ->live(onBlur: true)
                        ->emptyLabel('Oops! No Category Found')
                        ->relationship('category', 'name', 'parent_id'),
                    TagsInput::make('extra_things')
                        ->label('Products Name')
                        ->splitKeys(['Tab', ','])
                        ->helperText('List your products name separated by comma')
                        ->autofocus()
                        ->required(),
                    Section::make()
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
                                ->maxFiles(4)
                                ->autofocus()
                                ->multiple(),
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
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->wrap()
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])
            ])
            ->bulkActions([
                //
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                $query->orderBy('created_at', 'desc');
            });
    }

    public static function getRelations(): array
    {
        return [
//            AuditsRelationManager::class,
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
