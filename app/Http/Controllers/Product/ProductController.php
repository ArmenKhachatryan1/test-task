<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\DeleteProductRequest;
use App\Http\Requests\Product\GetAllProductsRequest;
use App\Http\Requests\Product\GetProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Listeners\SendPodcastNotification;
use App\Services\Product\Action\CreateProductAction;
use App\Services\Product\Action\DeleteProductAction;
use App\Services\Product\Action\GetAllProductsAction;
use App\Services\Product\Action\GetProductAction;
use App\Services\Product\Action\UpdateProductAction;
use App\Services\Product\Dto\CreateProductDto;
use App\Services\Product\Dto\GetAllProductsDto;
use App\Services\Product\Dto\UpdateProductDto;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function create(
        CreateProductAction $action,
        CreateProductRequest $request
    ) {
        $dto = CreateProductDto::fromRequest($request);
        $product = $action->run($dto);

        return new ProductResource($product);
    }

    public function show(
        GetProductRequest $request,
        GetProductAction $action
    ): ProductResource {
        $product = $action->run($request->getId());
        return new ProductResource($product);
    }

    public function showProducts(
        GetAllProductsAction $action,
        GetAllProductsRequest $request
    ): JsonResponse {
        $products = $action->run($request);

        return response()->json(['product' => $products]);
    }

    public function update(
        UpdateProductAction $action,
        UpdateProductRequest $request
    ) {
        $dto = UpdateProductDto::fromRequest($request);
        return $action->run($request, $dto);
    }

    public function delete(
        DeleteProductAction $action,
        DeleteProductRequest $request
    ): bool {
        return $action->run($request->getId(), $request->getUserId());
    }

    public function user()
    {
    }
}
