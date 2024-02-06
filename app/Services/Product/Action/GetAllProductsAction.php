<?php

namespace App\Services\Product\Action;

use App\Http\Requests\Product\GetAllProductsRequest;
use App\Repository\Product\Read\ReadProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetAllProductsAction
{
    public function __construct(
        private readonly ReadProductRepositoryInterface $readProductRepository
    ) {
    }

    public function run(GetAllProductsRequest $request): Collection
    {
        return $this->readProductRepository->getAllProducts('user', $request->getUserId());
    }
}
