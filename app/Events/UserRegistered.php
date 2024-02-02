<?php

namespace App\Events;

use App\Models\User\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UserRegistered implements ShouldQueue
{
    use Dispatchable;


    public function __construct(
        public User $user
    ) {
    }

}
