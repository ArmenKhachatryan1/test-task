<?php

namespace App\Repository\Product\Read;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;

interface ReadProductRepositoryInterface
{
    public function getById(int $id, string $relation): ?Product;
    public function getAllProducts(string $relation, int $id): Collection;
}
