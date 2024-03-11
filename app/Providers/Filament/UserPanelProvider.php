<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\EditProfile;
use App\Filament\Pages\Dashboard;
use App\Filament\User\Resources\EventResource;
use App\Filament\User\Resources\ForumResource;
use App\Filament\User\Resources\JobResource;
use App\Filament\User\Resources\ProductResource;
use App\Filament\User\Resources\DealResource;
use App\Filament\User\Resources\BlogResource;
use App\Filament\User\Resources\BookmarkCompaniesResource;
use App\Filament\User\Resources\CompanyResource;
use App\Filament\User\Resources\DirectMessageResource;
use App\Filament\User\Resources\WalletHistoryResource;
use App\Filament\User\Pages\LoginPage;
use App\Filament\User\Pages\RegisterPage;
use App\Filament\Widgets\StatsOverview;
use App\Http\Middleware\HkEmailVerification;
use App\Models\WalletHistory;
use Filament\Http\Controllers\Auth\EmailVerificationController;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Listeners\Auth\SendEmailVerificationNotification;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class UserPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $showNavigation = false;
        return $panel
            ->id('panel')
            ->path('user')
            ->homeUrl('/')
            ->login(LoginPage::class)
            ->registration(RegisterPage::class)
            ->passwordReset()
            ->emailVerification(EmailVerificationPrompt::class)
            ->profile(EditProfile::class, isSimple: false)
            ->colors([
                'primary' => Color::Purple,
            ])
            ->navigation(function (NavigationBuilder $builder) use ($showNavigation): NavigationBuilder {
                return $builder->items([
                    NavigationItem::make('Dashboard')
                        ->icon('heroicon-o-home')
                        ->isActiveWhen(fn (): bool => request()->routeIs(Dashboard::getUrl()))
                        ->url(fn (): string => Dashboard::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),
                    NavigationItem::make('Company Profile')
                        ->icon('heroicon-o-building-office-2')
                        ->isActiveWhen(fn (): bool => request()->routeIs(CompanyResource::getUrl()))
                        ->url(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return CompanyResource::getUrl('view', [$company->id]);
                                }else{
                                    $showNavigation = true;
                                    return CompanyResource::getUrl('edit', [$company->id]);
                                }
                            }
                            return CompanyResource::getUrl('create');
                        }),
                    NavigationItem::make('Products')
                        ->icon('heroicon-o-shopping-cart')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.product'))
                        ->url(fn (): string => ProductResource::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),
                    NavigationItem::make('Deals')
                        ->icon('heroicon-o-gift-top')
                        ->isActiveWhen(fn (): bool => request()->routeIs(DealResource::getUrl()))
                        ->url(fn (): string => DealResource::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),
                    NavigationItem::make('Blog')
                        ->icon('heroicon-o-fire')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.blog'))
                        ->url(fn (): string => BlogResource::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),
                    NavigationItem::make('Events')
                        ->icon('heroicon-o-calendar')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.event'))
                        ->url(fn (): string => EventResource::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),
                    NavigationItem::make('Jobs')
                        ->icon('heroicon-o-briefcase')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.job'))
                        ->url(fn (): string => JobResource::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),

                    NavigationItem::make('Forums')
                        ->icon('heroicon-o-chat-bubble-left-ellipsis')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.forum'))
                        ->url(fn (): string => ForumResource::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),
                    NavigationItem::make('Wallet History')
                        ->icon('heroicon-o-banknotes')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.wallet-history'))
                        ->url(fn (): string => WalletHistoryResource::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),
                    NavigationItem::make('Direct Messages')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.direct-message'))
                        ->url(fn (): string => DirectMessageResource::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),
                    NavigationItem::make('My Bookmarks')
                        ->icon('heroicon-o-bookmark-square')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.bookmark-companies'))
                        ->url(fn (): string => BookmarkCompaniesResource::getUrl())
                        ->visible(function (){
                            $company = \App\Models\Company::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
                            if($company){
                                if($company->is_approved){
                                    return true;
                                }
                            }
                            return false;
                        }),
                    NavigationItem::make('Log-out')
                        ->icon('heroicon-o-arrow-right-start-on-rectangle')
                        ->url(fn (): string => route('logout')),
                ]);
            })
            ->discoverResources(in: app_path('Filament/User/Resources'), for: 'App\\Filament\\User\\Resources')
            ->discoverPages(in: app_path('Filament/User/Pages'), for: 'App\\Filament\\User\\Pages')
            ->pages([
                Dashboard::class
            ])
            ->discoverWidgets(in: app_path('Filament/User/Widgets'), for: 'App\\Filament\\User\\Widgets')
            ->widgets([
                StatsOverview::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
