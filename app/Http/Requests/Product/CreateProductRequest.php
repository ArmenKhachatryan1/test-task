<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    private const NAME = 'name';
    private const DESCRIPTION = 'description';
    private const PRICE = 'price';

    public function rules(): array
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
                'required',
                'integer'
            ],
        ];
    }

    public function getName()
    {
        return $this->input(self::NAME);
    }

    public function getDescription()
    {
        return $this->input(self::DESCRIPTION);
    }

    public function getPrice()
    {
        return $this->input(self::PRICE);
    }

    public function getUserId()
    {
        return $this->user()->id;
    }

}
