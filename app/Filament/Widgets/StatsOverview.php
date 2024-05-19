<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Company;
use App\Models\Deal;
use App\Models\Event;
use App\Models\Job;
use App\Models\Product;
use App\Models\User;
use App\Models\WalletHistory;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    private string $userType;
    private int $userId;
    private int $userBalance;
    private int $userCompanyId;

    protected function getStats(): array
    {
        $prefix = '/user';
        $companyUrl = '';
        $user = auth()->user();
        $this->userType = $user->type;
        $this->userId = $user->id;
        $this->userBalance = $user->balance;
        $this->userCompanyId = $user->company ? $user->company->id : 0;


        $company = Company::where('user_id', $this->userId)->orderBy('created_at', 'desc')->first();
        if ($company) {

            $companyUrl = "user/companies/$company->id";
        }
        if ($this->userType == 'Admin') {
            $companyUrl = "admin/companies";
            $prefix = 'admin';
        }
        $walletTitle = $this->userType == 'Admin' ? 'Total Balance' : 'Wallet Balance';

        $chart = $this->userType == 'user' ?
            WalletHistory::where('user_id', $this->userId)->orderBy('created_at', 'desc')->get()->pluck('amount')->toArray() :
            WalletHistory::orderBy('created_at', 'desc')->get()->pluck('amount')->toArray();
        return [
            Stat::make($walletTitle, function () {
                if ($this->userType == 'Admin') {
                    return '$' . number_format(User::sum('balance'), 2);
                } else {
                    return '$' . number_format($this->userBalance, 2);
                }
            })
                ->color('#363062')
                ->url($companyUrl)
                ->chart($chart)
                ->color('success')
                ->icon('heroicon-o-currency-dollar'),
            $this->userType == 'Admin' ? Stat::make('Companies', function () {
                if ($this->userType == 'Admin') {
                    return Company::count();
                } else {
                    return Company::where('user_id', $this->userId)->count();
                }
            })
                ->color('#363062')
                ->url($companyUrl)
                ->icon('heroicon-o-building-office-2') : null,
            Stat::make('Products', function () {
                if ($this->userType == 'Admin') {
                    return Product::count();
                } else {
                    return Product::where('company_id', $this->userCompanyId)->count();
                }
            })
                ->color('info')
                ->url("$prefix/products")
                ->icon('heroicon-o-shopping-cart'),
            Stat::make('Events', function () {
                if ($this->userType == 'Admin') {
                    return Event::count();
                } else {
                    return Event::where('company_id', $this->userCompanyId)->count();
                }
            })
                ->url("$prefix/events")
                ->icon('heroicon-o-calendar'),
            Stat::make('Jobs', function () {
                if ($this->userType == 'Admin') {
                    return Job::count();
                } else {
                    return Job::where('company_id', $this->userCompanyId)->count();
                }
            })
                ->url("$prefix/jobs")
                ->icon('heroicon-o-briefcase'),
            Stat::make('Blogs', function () {
                if ($this->userType == 'Admin') {
                    return Blog::count();
                } else {
                    return Blog::where('company_id', $this->userCompanyId)->count();
                }
            })
                ->url("$prefix/blogs")
                ->icon('heroicon-o-newspaper'),
            Stat::make('Deals', function () {
                if ($this->userType == 'Admin') {
                    return Deal::count();
                } else {
                    return Deal::where('company_id', $this->userCompanyId)->count();
                }
            })
                ->url("$prefix/deals")
                ->icon('heroicon-o-tag'),
        ];
    }
}
