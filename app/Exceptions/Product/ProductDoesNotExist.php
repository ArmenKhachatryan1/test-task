<?php

namespace App\Exceptions\Product;

class ProductDoesNotExist extends ProductExeption
{
    public function getErrorMessage()
    {
        $data = [
            'message' => 'product does not exist',
            'status' => ProductExeption::PRODUCT_DOES_NOT_EXIST
        ];
        return response()->json($data);
    }
}
