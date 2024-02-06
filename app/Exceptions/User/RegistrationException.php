<?php

namespace App\Exceptions\User;

use App\Exceptions\UserException;

class RegistrationException extends UserException
{
    public function getStatus(): int
    {
        return UserException::FAIL_TO_REGISTER;
    }

    public function getStatusMessage(): string
    {
        return 'Incorrect dates';
    }
}
