<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cloudinary;

//Facades
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Global Variables on Views
        view()->share('app_name',           Config::get('brand.name'));
        view()->share('app_description',    Config::get('brand.description'));
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
