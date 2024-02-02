<?php

namespace App\Services\Product\Action;

use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product\Product;
use App\Repository\Product\Write\WriteProductRepositoryInterface;
use App\Services\Product\Dto\UpdateProductDto;

class UpdateProductAction
{
    public function __construct(
        private readonly WriteProductRepositoryInterface $writeProductRepository
    )
    {
    }
    public function run(UpdateProductRequest $request, UpdateProductDto $dto)
    {
        return $this->writeProductRepository->update($request->getUserId(), Product::updateProduct($dto));
    }
}
