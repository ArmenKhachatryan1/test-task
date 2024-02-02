<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendWelcomeEmail implements ShouldQueue
{
    public function handle(UserRegistered $event): void
    {
        $code =rand(1000000,9000000);

        Mail::raw("Your verification code is: $code", function ($message) use ($event) {
            $message->to($event->user->email)->subject('Verification Code');
        });


    }
}
