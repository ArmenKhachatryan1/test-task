<?php

namespace App\Exceptions\Product;

class CreateProductException extends ProductExeption
{
    public function getErrorMessage()
    {
        $data = [
            'message' => 'fail to create product',
            'status' => ProductExeption::FAIL_TO_CREATE_PRODUCT
        ];
        return response()->json($data);
    }
}
