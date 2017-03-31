<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        /*
        Response::macro('caps', function ($value) {
            return Response::make(strtoupper($value));
        });
        */

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
