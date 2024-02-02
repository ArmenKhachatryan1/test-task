<?php

namespace App\Services\Product\Dto;

use App\Http\Requests\Product\GetAllProductsRequest;
use Spatie\LaravelData\Data;

class GetAllProductsDto extends Data
{
    public string $name;
    public string $description;
    public int $price;
    public int $userId;

    public static function fromRequests(GetAllProductsRequest $request): self
    {
        return  self::from([
            'name' => $request->getName(),
            'description' => $request->getDescription(),
            'price' => $request->getPrice(),
            'userId' => $request->getUserId()
        ]);
    }
}
