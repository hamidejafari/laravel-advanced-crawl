<?php

namespace App\Providers;

use DateTime;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once app_path('Library/composer.php');
        require_once app_path('Library/jdate.php');
        Schema::defaultStringLength(191);
    }
}
