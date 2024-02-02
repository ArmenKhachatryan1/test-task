<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    private const NAME = 'name';
    private const EMAIl = 'email';
    private const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string'
            ],
            self::EMAIl => [
                'required',
                'string'
            ],
            self::PASSWORD => [
                'required',
                'string'
            ]
        ];
    }

    public function getName(): string
    {
         return $this->input(self::NAME);
    }
    public function getEmail(): string
    {
        return $this->input(self::EMAIl);
    }
    public function getPassword(): string
    {
        return $this->input(self::PASSWORD);
    }
}
