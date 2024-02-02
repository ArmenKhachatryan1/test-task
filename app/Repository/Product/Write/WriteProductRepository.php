<?php

namespace App\Repository\Product\Write;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class WriteProductRepository implements WriteProductRepositoryInterface
{
    public function query(): Builder
    {
        return Product::query();
    }

    public function create(array $data): Product
    {
        /* @var Product $product */
        $product = $this->query()->create($data);

        return $product;
    }

    public function update(int $id, array $data): JsonResponse
    {
        $product = Product::query()->where('user_id', $id)->first()->update($data);
        if (!$product) {
            return response()->json(['error' => 'not such product']);
        } else {
            return response()->json(['status' => 'updated']);
        }
    }

    public function delete(int $id, int $userId): bool
    {
        if (!$this->query()->where('id', $id)->where('user_id', $userId)->delete()) {
            return false;
        };

        return true;
    }
}
