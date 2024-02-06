<?php

namespace App\Services\Product\Action;

use App\Exceptions\Product\UpdateProductException;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product\Product;
use App\Repository\Product\Write\WriteProductRepositoryInterface;
use App\Services\Product\Dto\UpdateProductDto;
use Illuminate\Http\JsonResponse;

class UpdateProductAction
{
    public function __construct(
        private readonly WriteProductRepositoryInterface $writeProductRepository
    )
    {
    }

    /**
     * @throws UpdateProductException
     */
    public function run(UpdateProductRequest $request, UpdateProductDto $dto): void
    {
         $this->writeProductRepository->update($request->getUserId(), Product::updateProduct($dto));
    }
}
