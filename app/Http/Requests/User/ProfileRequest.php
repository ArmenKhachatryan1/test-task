<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function getUserId()
    {
        return $this->user()->id;
    }
}
