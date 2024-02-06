<?php

namespace App\Exceptions\Product;

use App\Exceptions\ProductException;

class ProductDoesNotExist extends ProductException
{
    public function getStatus(): int
    {
        return ProductException::PRODUCT_DOES_NOT_EXIST;
    }

    public function getStatusMessage(): string
    {
        return 'Product does not exist';
    }
}
