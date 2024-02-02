<?php

namespace App\Services\User\Dto;

use App\Http\Requests\User\LoginRequest;
use Spatie\LaravelData\Data;

class LoginDto extends Data
{
    public string $email;
    public string $password;

    public static function fromRequest(LoginRequest $request): self
    {
        return self::from([
            'email' => $request->getEmail(),
            'password' => $request->getPassword()
        ]);
    }

}
