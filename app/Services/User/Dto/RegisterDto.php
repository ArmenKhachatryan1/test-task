<?php

namespace App\Services\User\Dto;

use App\Http\Requests\User\RegisterRequest;
use Spatie\LaravelData\Data;

class RegisterDto extends Data
{
    public string $name;
    public string $email;
    public string $password;

    public static function fromRequest(RegisterRequest $request): self
    {
        return self::from([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'password' => $request->getPassword()
        ]);
    }
}
