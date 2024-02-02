<?php

namespace App\Services\Product\Dto;

use App\Http\Requests\Product\UpdateProductRequest;
use Spatie\LaravelData\Data;

class UpdateProductDto extends Data
{
    public int $id;
    public string $name;
    public string $description;
    public int $price;
    public int $userId;

    public static function fromRequest(UpdateProductRequest $request): self
    {
        return self::from([
            'name' => $request->getName(),
            'description' => $request->getDescription(),
            'price' => $request->getPrice(),
            'userId' => $request->getUserId(),
        ]);
    }
}
