<?php

namespace App\Services\User\Action;

use App\Events\UserRegistered;
use App\Exceptions\User\RegistrationException;
use App\Models\User\User;
use App\Repository\User\Write\RegisterProductRepositoryInterface;
use App\Services\User\Dto\RegisterDto;

class RegisterAction
{
    public function __construct(
        private readonly RegisterProductRepositoryInterface $registerProductRepository
    ) {
    }

    /**
     * @throws RegistrationException
     */
    public function run(RegisterDto $dto): array
    {
        if(!$a = $this->registerProductRepository->register(User::registerUser($dto))){
            throw new RegistrationException();
        }
        event(new UserRegistered($a['user']));
        return $a;
    }
}
