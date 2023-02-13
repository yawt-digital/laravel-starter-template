<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Attributes\Validation;
use Spatie\LaravelData\Data;

class LoginData extends Data
{
    public function __construct(
        public string $email,
        public string $password,
        public bool $remember = false
    ) {
    }

    public static function rules(): array
    {
        return [
            'email' => [new Validation\Email],
        ];
    }
}
