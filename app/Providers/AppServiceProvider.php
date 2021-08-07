<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    const SESSION_KEY = "user.linkey";
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
        Schema::defaultStringLength(191);

        if (!session()->has(self::SESSION_KEY) && session(self::SESSION_KEY) === null) {
            session()->put(self::SESSION_KEY, uniqid('linkey.'));
        }
    }
}
