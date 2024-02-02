<?php

namespace App\Services\User\Action;

use App\Events\UserRegistered;
use App\Models\User\User;
use App\Repository\User\Write\RegisterProductRepositoryInterface;
use App\Services\User\Dto\RegisterDto;

class RegisterAction
{
    public function __construct(
        private readonly RegisterProductRepositoryInterface $registerProductRepository
    ) {
    }

    public function run(RegisterDto $dto): array
    {
        $a = $this->registerProductRepository->register(User::registerUser($dto));
        event(new UserRegistered($a['user']));
        return $a;
    }
}
