<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class GetAllProductsRequest extends FormRequest
{
    private const ID = 'id';
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
                'string',
            ],
            self::PRICE => [
                'integer',
                'required'
            ],

        ];
    }

    public function getName()
    {
        return $this->get(self::NAME);
    }

    public function getDescription()
    {
        return $this->get(self::DESCRIPTION);
    }

    public function getPrice()
    {
        return $this->get(self::PRICE);
    }

    public function getUserId()
    {
        return $this->user()->id;
    }

}
