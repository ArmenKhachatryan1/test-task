<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    private const EMAIL = 'email';
    private const PASSWORD = 'password';
    public function rules(): array
    {
        return [
            self::EMAIL =>[
                'required',
                'string'
            ],
            self::PASSWORD => [
                'required',
                'string'
            ]
        ];
    }
    public function getEmail(): string
    {
        return $this->input(self::EMAIL);
    }
    public function getPassword(): string
    {
        return $this->input(self::PASSWORD);
    }
    public function getUserId(): int
    {
        return $this->user()->id;
    }
}
