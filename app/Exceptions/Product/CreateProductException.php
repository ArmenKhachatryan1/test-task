<?php

namespace App\Exceptions\Product;

use App\Exceptions\ProductException;

class CreateProductException extends ProductException
{
    public function getStatus(): int
    {
        return ProductException::FAIL_TO_CREATE_PRODUCT;
    }

    public function getStatusMessage(): string
    {
        return "fail to create product";
    }
}
