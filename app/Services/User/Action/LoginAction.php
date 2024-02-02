<?php

namespace App\Services\User\Action;

use App\Services\User\Dto\LoginDto;

class LoginAction
{

    public function run(LoginDto $dto)
    {
        $data = [
            'email' => $dto->email,
            'password' => $dto->password
        ];
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('auth_token')->accessToken;

            return ['token' => $token, 'user' => auth()->user()];
        } else {
            return response()->json(['error message' => 'Unauthorized']);
        }
    }


}
