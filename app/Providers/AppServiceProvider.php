<?php

namespace App\Providers;

use App\Events\PostEvent;
use App\Listeners\PostEventNotification;
use App\Listeners\UserNotify;
use App\Listeners\AdminNotify;
use App\Listeners\LoginUserEventListener;
use App\Services\PaymentService;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind('PaymentService', function ($app) {
            return new PaymentService();
        });        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Event::listen(
            PostEventNotification::class,
            UserNotify::class,
            AdminNotify::class,
            LoginUserEventListener::class
        );
    }
}

//protected $listen = [
//'App\Event\UserCreated' => [
//'App\Listener\SendEmail',
//],
//];
