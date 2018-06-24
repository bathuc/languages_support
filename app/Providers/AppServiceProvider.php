<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    protected $helpers = [
        // Add your helpers in here
        'FuncHelper',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->helpers as $helper) {
            $helper_path = app_path().'/Helpers/'.$helper.'.php';

            if (\File::isFile($helper_path)) {
                require_once $helper_path;
            }
        }
    }
}
