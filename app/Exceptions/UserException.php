<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response as Response;

abstract class UserException extends Exception
{
    public const FAIL_TO_LOGIN = 200;
    public const FAIL_TO_REGISTER = 201;

    private int $httpStatusCode = Response::HTTP_BAD_REQUEST;

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public abstract function getStatus(): int;

    public abstract function getStatusMessage(): string;
}
