<?php

namespace App\Exceptions\Product;

use App\Exceptions\ProductException;

class DeleteProductException extends ProductException
{
  public function getStatus():int
  {
     return ProductException::FAIL_TO_DELETE_PRODUCT;
  }

  public function getStatusMessage():string
  {
      return "fail to delete product";
  }
}
