<?php

namespace App\Repository\User\Write;

use App\Events\UserRegistered;
use App\Listeners\SendWelcomeEmail;
use App\Models\User\User;

class RegisterRepository implements RegisterProductRepositoryInterface
{
    public function register(array $data)
    {
        $user = User::query()->create($data);
        $token = $user->createToken('auth-token')->accessToken;

        return ['user' => $user, 'token' => $token];
    }
}
