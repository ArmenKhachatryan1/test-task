<?php

namespace App\Repository\Product\Read;

interface ReadProductRepositoryInterface
{
    public function getById(int $id, string $relation);
    public function getAllProducts(string $relation, int $id);
}
