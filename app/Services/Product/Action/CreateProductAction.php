<?php

namespace App\Services\Product\Action;

use App\Events\UserRegistered;
use App\Models\Product\Product;
use App\Repository\Product\Write\WriteProductRepositoryInterface;
use App\Services\Product\Dto\CreateProductDto;

class CreateProductAction
{
    public function __construct(
        private readonly WriteProductRepositoryInterface $createProductRepository
    ) {
    }

    public function run(CreateProductDto $dto): Product
    {
        return $this->createProductRepository->create(Product::createProduct($dto));
    }

}
