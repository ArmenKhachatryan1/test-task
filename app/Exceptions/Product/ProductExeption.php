<?php

namespace App\Exceptions\Product;
use Exception;

abstract class ProductExeption extends Exception
{
    public const FAIL_TO_CREATE_PRODUCT = 100;
    public const FAIL_TO_DELETE_PRODUCT = 101;
    public const FAIL_TO_UPDATE_PRODUCT = 102;
    public const PRODUCT_DOES_NOT_EXIST = 103;

    public abstract function getErrorMessage();
}
