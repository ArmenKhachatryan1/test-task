<?php

namespace App\Services\Product\Action;

use App\Models\Product\Product;
use App\Repository\Product\Read\ReadProductRepositoryInterface;

class GetProductAction
{
    public function __construct(
        private readonly ReadProductRepositoryInterface $readProductRepository
    ) {
    }
    public function run(int $id): ?Product
    {
       return $this->readProductRepository->getById($id, 'user');
    }
}
