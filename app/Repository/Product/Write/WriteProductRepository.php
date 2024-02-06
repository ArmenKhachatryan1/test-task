<?php

namespace App\Repository\Product\Write;

use App\Exceptions\Product\CreateProductException;
use App\Exceptions\Product\DeleteProductException;
use App\Exceptions\Product\UpdateProductException;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Builder;

class WriteProductRepository implements WriteProductRepositoryInterface
{
    public function query(): Builder
    {
        return Product::query();
    }

    /**
     * @throws CreateProductException
     */
    public function create(array $data): Product
    {
        /* @var Product $product */
        if (!$product = $this->query()->create($data)) {
            throw new CreateProductException();
        }

        return $product;
    }

    /**
     * @throws UpdateProductException
     */
    public function update(int $id, array $data): bool
    {
        if (!$this->query()->where('user_id', $id)->update($data)) {
            throw new UpdateProductException();
        }
        return true;
    }

    /**
     * @throws DeleteProductException
     */
    public function delete(int $id, int $userId): bool
    {
        if (!$this->query()->where('id', $id)->where('user_id', $userId)->delete()) {
            throw  new DeleteProductException();
        }

        return true;
    }
}
