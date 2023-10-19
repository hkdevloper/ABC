<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Filament\Resources\EventResource;
use App\Filament\Resources\ForumResource;
use App\Filament\Resources\JobResource;
use App\Filament\Resources\ProductResource;
use App\Filament\User\Pages\CompanyProfileSetup;
use App\Filament\User\Resources\BlogResource;
use App\Http\Middleware\CompanyProfileValidation;
use App\Http\Middleware\HkEmailVerification;
use Egulias\EmailValidator\Validation\EmailValidation;
use Filament\Http\Controllers\Auth\EmailVerificationController;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Http\Responses\Auth\EmailVerificationResponse;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Shipu\WebInstaller\Middleware\RedirectIfNotInstalled;
use Symfony\Component\Mime\Test\Constraint\EmailAddressContains;

class UserPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $showNavigation = false;
        if(auth()->user()){
            if(auth()->user()->company !== null && auth()->user()->company->is_approved){
                $showNavigation = true;
            }
        }

        return $panel
            ->id('user')
            ->path('user/dashboard')
            ->login()
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->colors([
                'primary' => Color::Purple,
            ])
            ->navigation(function (NavigationBuilder $builder) use ($showNavigation): NavigationBuilder {
                return $builder->items([
                    NavigationItem::make('Dashboard')
                        ->icon('heroicon-o-home')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.pages.dashboard'))
                        ->url(fn (): string => Dashboard::getUrl()),
                    NavigationItem::make('Company Profile')
                        ->icon('heroicon-o-building-office-2')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.pages.company-profile-setup'))
                        ->url(fn (): string => CompanyProfileSetup::getUrl()),
                    NavigationItem::make('Products')
                        ->icon('heroicon-o-shopping-cart')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.product'))
                        ->url(fn (): string => ProductResource::getUrl())
                        ->visible(fn() => $showNavigation),
                    NavigationItem::make('Blog')
                        ->icon('heroicon-o-fire')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.blog'))
                        ->url(fn (): string => BlogResource::getUrl())
                        ->visible(fn() => $showNavigation),
                    NavigationItem::make('Events')
                        ->icon('heroicon-o-calendar')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.event'))
                        ->url(fn (): string => EventResource::getUrl())
                        ->visible(fn() => $showNavigation),
                    NavigationItem::make('Jobs')
                        ->icon('heroicon-o-briefcase')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.job'))
                        ->url(fn (): string => JobResource::getUrl())
                        ->visible(fn() => $showNavigation),

                    NavigationItem::make('Forums')
                        ->icon('heroicon-o-chat-bubble-left-ellipsis')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.user.resources.forum'))
                        ->url(fn (): string => ForumResource::getUrl())
                        ->visible(fn() => $showNavigation),
                ]);
            })
            ->discoverResources(in: app_path('Filament/User/Resources'), for: 'App\\Filament\\User\\Resources')
            ->discoverPages(in: app_path('Filament/User/Pages'), for: 'App\\Filament\\User\\Pages')
            ->pages([
                Dashboard::class
            ])
            ->discoverWidgets(in: app_path('Filament/User/Widgets'), for: 'App\\Filament\\User\\Widgets')
            ->widgets([])
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
//                HkEmailVerification::class
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
