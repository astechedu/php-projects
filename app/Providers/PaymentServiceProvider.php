<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Facade;

//Services
use App\Services\PaymentService;

//Facades
use App\Facades\Payment;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //Register the facade for the payment service: App\Facades
        $this->app->bind('payment', function () {
            return new Payment();
        }); 
        
       //Services in Container; App\Services
        $this->app->bind('PaymentService', function ($app) {
            return new PaymentService();
        });        
    }       

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
