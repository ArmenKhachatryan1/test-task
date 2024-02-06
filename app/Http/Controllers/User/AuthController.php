<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Resources\Token\TokenResource;
use App\Services\User\Action\LoginAction;
use App\Services\User\Action\RegisterAction;
use App\Services\User\Dto\LoginDto;
use App\Services\User\Dto\RegisterDto;

class AuthController extends Controller
{
    public function register(RegisterAction $action, RegisterRequest $request): TokenResource
    {
        $dto = RegisterDto::fromRequest($request);
        $userToken = $action->run($dto);
        return new TokenResource($userToken);
    }

    public function login(LoginAction $action, LoginRequest $request): TokenResource
    {
        $dto = LoginDto::fromRequest($request);
        $userToken = $action->run($dto);
        return new TokenResource($userToken);
    }
}
