<?php

namespace App\Services\Product\Dto;

use App\Http\Requests\Product\CreateProductRequest;
use Spatie\LaravelData\Data;

class CreateProductDto extends Data
{
    public string $name;
    public string $description;
    public int $price;
    public int $userId;
    public static function fromRequest(CreateProductRequest $request): self
    {
        return self::from([
            'name' => $request->getName(),
            'description' => $request->getDescription(),
            'price' =>$request->getPrice(),
            'userId' => $request->getUserId(),
        ]);
    }
}
