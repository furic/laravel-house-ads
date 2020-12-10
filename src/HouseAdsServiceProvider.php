<?php

namespace Furic\HouseAds;

use Illuminate\Support\ServiceProvider;

class HouseAdsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        // $this->publishes([
        //     __DIR__ . '/../config/house-ads.php' => config_path('house-ads.php'),
        // ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Furic\HouseAds\Http\Controllers\HouseAdController');
        // $this->mergeConfigFrom(
        //     __DIR__ . '/../config/house-ads.php', 'house-ads'
        // );
    }
}
