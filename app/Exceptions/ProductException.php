<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

abstract class ProductException extends Exception
{
    public const FAIL_TO_CREATE_PRODUCT = 100;
    public const FAIL_TO_DELETE_PRODUCT = 101;
    public const FAIL_TO_UPDATE_PRODUCT = 102;
    public const PRODUCT_DOES_NOT_EXIST = 103;

    private int $httpStatusCode = Response::HTTP_BAD_REQUEST;

    /*
      returns bad request
    */

    public function getHttpSatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public abstract function getStatusMessage(): string; //returns exception message

    public abstract function getStatus(): int; // returns exception code
}
