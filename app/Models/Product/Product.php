<?php

namespace App\Models\Product;

use App\Models\User\User;
use App\Services\Product\Dto\CreateProductDto;
use App\Services\Product\Dto\GetAllProductsDto;
use App\Services\Product\Dto\UpdateProductDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'user_id'
    ];
    public static function createProduct(CreateProductDto $dto): array
    {
        return [
            'name' => $dto->name,
            'description' => $dto->description,
            'price' => $dto->price,
            'user_id' => $dto->userId,
        ];
    }
    public static function updateProduct(UpdateProductDto $dto): array
    {
        return [
            'name' => $dto->name,
            'price' => $dto->price,
            'description' => $dto->description,
        ];
    }
    public static function getAllProducts(GetAllProductsDto $dto): array{
        return [
            'name' => $dto->name,
            'description' => $dto->description,
            'price' => $dto->price,
            'user_id' => $dto->userId
        ];
    }
    public function user(): hasOne
    {

        return $this->hasOne(User::class, 'id','user_id');
    }
}
