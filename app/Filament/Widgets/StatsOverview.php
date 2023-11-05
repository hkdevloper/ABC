<?php

namespace App\Filament\Widgets;

use App\Filament\User\Resources\CompanyResource;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $company = \App\Models\Company::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        $prefix = '/user/dashboard';

        $companyUrl = "dashboard/companies/$company->id";
        if(auth()->user()->type == 'Admin'){
            $companyUrl = "admin/companies";
            $prefix = 'admin';
        }

        return [
            Stat::make('Companies', function (){
                if(auth()->user()->type == 'Admin'){
                    return \App\Models\Company::count();
                }
                else{
                    return \App\Models\Company::where('user_id', auth()->user()->id)->count();
                }
            })
                ->url($companyUrl)
                ->icon('heroicon-o-building-office-2'),
            Stat::make('Products', function (){
                if(auth()->user()->type == 'Admin'){
                    return \App\Models\Product::count();
                }
                else{
                    return \App\Models\Product::where('user_id', auth()->user()->id)->count();
                }
            })
                ->url("$prefix/products")
                ->icon('heroicon-o-shopping-cart'),
            Stat::make('Events', function (){
                if(auth()->user()->type == 'Admin'){
                    return \App\Models\Event::count();
                }
                else{
                    return \App\Models\Event::where('user_id', auth()->user()->id)->count();
                }
            })
                ->url("$prefix/events")
                ->icon('heroicon-o-calendar'),
            Stat::make('Jobs', function (){
                if(auth()->user()->type == 'Admin'){
                    return \App\Models\Job::count();
                }
                else{
                    return \App\Models\Job::where('user_id', auth()->user()->id)->count();
                }
            })
                ->url("$prefix/jobs")
                ->icon('heroicon-o-briefcase'),
            Stat::make('Blogs', function (){
                if(auth()->user()->type == 'Admin'){
                    return \App\Models\Blog::count();
                }
                else{
                    return \App\Models\Blog::where('user_id', auth()->user()->id)->count();
                }
            })
                ->url("$prefix/blogs")
                ->icon('heroicon-o-newspaper'),
            Stat::make('Deals', function (){
                if(auth()->user()->type == 'Admin'){
                    return \App\Models\Deal::count();
                }
                else{
                    return \App\Models\Deal::where('user_id', auth()->user()->id)->count();
                }
            })
                ->url("$prefix/deals")
                ->icon('heroicon-o-tag'),
        ];
    }
}
