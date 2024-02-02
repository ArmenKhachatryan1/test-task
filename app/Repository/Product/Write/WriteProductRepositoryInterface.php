<?php

namespace App\Repository\Product\Write;


interface WriteProductRepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id, int $userId): bool;
}
