<?php

namespace App\Exceptions\Product;

class UpdateProductException extends ProductExeption
{
    public function getErrorMessage()
    {
        $data = [
            'message' => 'fail to update product',
            'status' => ProductExeption::FAIL_TO_UPDATE_PRODUCT
        ];
        return response()->json($data);
    }
}
