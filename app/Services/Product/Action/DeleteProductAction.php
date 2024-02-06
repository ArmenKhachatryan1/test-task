<?php

namespace App\Services\Product\Action;

use App\Repository\Product\Write\WriteProductRepositoryInterface;

class DeleteProductAction
{
    public function __construct(
        private readonly WriteProductRepositoryInterface $writeProductRepository
    ) {
    }

    public function run(int $id, int $userId): void
    {
         $this->writeProductRepository->delete($id, $userId);
    }
}
