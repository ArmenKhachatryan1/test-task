<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class GetProductRequest extends FormRequest
{
    private const ID = 'id';

    public function getId(): int
    {
        return $this->route(self::ID);
    }
}
