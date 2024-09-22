<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Facade;
//use App\Facades\PaymentFacade;
//use App\Services\PaymentService;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //Register the facade for the payment service
        // Facade::extend('payment', function ($app) {
        //     return new PaymentFacade(new PaymentService());
        // });   
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
