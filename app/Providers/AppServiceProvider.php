<?php

namespace App\Providers;

use App\SiteNavigation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        try {
            if (Schema::hasTable('site_navigations') && Schema::hasTable('site_navigation_items')) {
                $siteNavigations = SiteNavigation::with('navigation_items')->get();
    
                $topNavigation = $siteNavigations->first(function ($navigation) {
                    return $navigation->menu_name === 'Top Header Menu';
                });
    
                $headerNavigation = $siteNavigations->first(function ($header) {
                    return $header->menu_name === 'Header Menu';
                });
    
                $footerNavigation = $siteNavigations->first(function ($navigation) {
                    return $navigation->menu_name === 'Footer Menu';
                });
    
                view()->share('topNavigation', $topNavigation);
                view()->share('headerNavigation', $headerNavigation);
                view()->share('footerNavigation', $footerNavigation);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}