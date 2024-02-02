<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    private const ID = 'id';
    private const NAME = 'name';
    private const DESCRIPTION = 'description';
    private const PRICE = 'price';

    public function rules()
    {
        return [
            self::NAME => [
                'string',
                'required'
            ],
            self::DESCRIPTION => [
                'string'
            ],
            self::PRICE => [
                'integer',
                'required'
            ],
        ];
    }




    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getDescription(): string
    {
        return $this->get(self::DESCRIPTION);
    }

    public function getPrice(): int
    {
        return $this->get(self::PRICE);
    }

    public function getUserId(): int
    {
        return $this->user()->id;
    }

}
