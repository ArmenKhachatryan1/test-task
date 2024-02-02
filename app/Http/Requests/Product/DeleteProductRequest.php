<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
{
    private const ID = 'id';

    public function getUserId(): int
    {
        return $this->user()->id;
    }

    public function getId(): int
    {
        return $this->route(self::ID);
    }
}
