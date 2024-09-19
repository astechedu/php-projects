<?php

namespace App\Listeners;

use App\Events\LoginUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Mail;
use App\Mail\LoggedInUserEmail;

class LoginUserEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoginUserEvent $event): void
    {
        $loggedInUser = $event->loggedInUser;
        $email=$loggedInUser['email'];
        
        Mail::to($email)->send( new LoggedInUserEmail($loggedInUser));
    }
}
