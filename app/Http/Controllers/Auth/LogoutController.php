<?php

namespace App\Http\Controllers\Auth;

class LogoutController
{
    public function __invoke()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return to_route('login');
    }
}
