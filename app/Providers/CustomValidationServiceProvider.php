<?php

namespace App\Providers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('no_telpon', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^\d{10,15}$/', $value);
        });
    }
}