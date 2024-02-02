<?php

namespace App\Exceptions\Product;

class DeleteProductException extends ProductExeption
{
    public function getErrorMessage()
    {
        $data = [
            'message' => 'fail to delete product',
            'status' => ProductExeption::FAIL_TO_DELETE_PRODUCT
        ];
        return response()->json($data);
    }
}
