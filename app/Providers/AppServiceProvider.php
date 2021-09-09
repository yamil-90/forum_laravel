<?php

namespace App\Providers;

use Schema;
use Illuminate\Support\ServiceProvider;

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
        //
        Schema::defaultStringLength(191);

    }
    // Blade::if('admin', function () {
    //         if (auth()->user() && auth()->user()->admin) {
    //             return 1;
    //         }
    //         return 0;
    //     });
}
