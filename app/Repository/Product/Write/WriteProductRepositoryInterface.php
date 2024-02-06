<?php

namespace App\Repository\Product\Write;


use App\Exceptions\Product\UpdateProductException;
use App\Models\Product\Product;
use Illuminate\Http\JsonResponse;

interface WriteProductRepositoryInterface
{
    public function create(array $data):Product;

    /**
     * @throws UpdateProductException
     */
    public function update(int $id, array $data): bool;

    public function delete(int $id, int $userId): bool;
}
