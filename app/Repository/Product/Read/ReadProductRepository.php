<?php

namespace App\Repository\Product\Read;

use App\Exceptions\Product\ProductDoesNotExist;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;

class ReadProductRepository implements ReadProductRepositoryInterface
{
    /**
     * @throws ProductDoesNotExist
     */
    public function getById(int $id, string $relation): ?Product
    {
        if (!$product = Product::query()->where('id', $id)->with($relation)->first()) {
            throw new ProductDoesNotExist();
        }
        return $product;
    }

    /**
     * @throws ProductDoesNotExist
     */
    public function getAllProducts(string $relation, int $id): Collection
    {
        if ($products = Product::query()->where('user_id', $id)->get()) {
            throw new ProductDoesNotExist();
        }
        return $products;
    }
}
