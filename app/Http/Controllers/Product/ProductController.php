<?php

namespace App\Http\Controllers\Product;

use App\Exceptions\Product\UpdateProductException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\DeleteProductRequest;
use App\Http\Requests\Product\GetAllProductsRequest;
use App\Http\Requests\Product\GetProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Services\Product\Action\CreateProductAction;
use App\Services\Product\Action\DeleteProductAction;
use App\Services\Product\Action\GetAllProductsAction;
use App\Services\Product\Action\GetProductAction;
use App\Services\Product\Action\UpdateProductAction;
use App\Services\Product\Dto\CreateProductDto;
use App\Services\Product\Dto\UpdateProductDto;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function create(
        CreateProductAction $action,
        CreateProductRequest $request
    ): ProductResource {
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

        return $this->jsonResponse(['product' => $products]);
    }

    /**
     * @param UpdateProductAction $action
     * @param UpdateProductRequest $request
     * @return JsonResponse
     * @throws UpdateProductException
     */
    public function update(
        UpdateProductAction $action,
        UpdateProductRequest $request
    ): JsonResponse {
        $dto = UpdateProductDto::fromRequest($request);
        $action->run($request, $dto);

        return $this->jsonResponse(['message' => 'updated']);
    }

    public function delete(
        DeleteProductAction $action,
        DeleteProductRequest $request
    ): JsonResponse {
        $action->run($request->getId(), $request->getUserId());

        return $this->jsonResponse();
    }


}
