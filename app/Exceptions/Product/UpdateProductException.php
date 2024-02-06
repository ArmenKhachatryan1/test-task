<?php

namespace App\Exceptions\Product;

use App\Exceptions\ProductException;

class UpdateProductException extends ProductException
{
    public function getStatus():int
    {
        return ProductException::FAIL_TO_UPDATE_PRODUCT;
    }
    public function getStatusMessage(): string
    {
        return 'Fail to update user';
    }
}
