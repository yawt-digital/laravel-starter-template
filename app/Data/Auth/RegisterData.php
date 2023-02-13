<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Attributes\Validation;
use Spatie\LaravelData\Data;

class RegisterData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $password_confirmation
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => [
                new Validation\Max(255),
            ],
            'email' => [
                new Validation\Email,
                new Validation\Unique('users'),
            ],
            'password' => [
                new Validation\Password(6),
                new Validation\Confirmed,
            ],
        ];
    }
}
