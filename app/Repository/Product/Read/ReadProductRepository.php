<?php

namespace App\Repository\Product\Read;

use App\Models\Product\Product;

class ReadProductRepository implements ReadProductRepositoryInterface
{
    public function getById(int $id, string $relation)
    {
        return Product::query()->where('id', $id)->with($relation)->first();
    }

    public function getAllProducts(string $relation, int $id)
    {
        return Product::query()->where('user_id', $id)->get()->all();
    }
}
