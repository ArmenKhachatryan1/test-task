<?php

namespace App\Services\User\Action;

use App\Exceptions\User\LoginException;
use App\Services\User\Dto\LoginDto;
use Illuminate\Http\JsonResponse;

class LoginAction
{

    /**
     * @throws LoginException
     */
    public function run(LoginDto $dto): JsonResponse|array
    {
        $data = [
            'email' => $dto->email,
            'password' => $dto->password
        ];
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('auth_token')->accessToken;

            return ['token' => $token, 'user' => auth()->user()];
        } else {
            throw new LoginException();
        }
    }


}
