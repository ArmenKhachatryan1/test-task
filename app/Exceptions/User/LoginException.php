<?php

namespace App\Exceptions\User;

use App\Exceptions\UserException;

class LoginException extends UserException
{
    public function getStatus(): int
    {
        return UserException::FAIL_TO_LOGIN;
    }

    public function getStatusMessage(): string
    {
        return 'Incorrect dates';
    }
}
