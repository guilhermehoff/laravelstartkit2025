<?php

namespace App\Providers;

use App\Services\SiteService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $siteService = app(SiteService::class);
            $site = $siteService->getSiteData();
            $view->with(['site' => $site]);
        });
    }
}
