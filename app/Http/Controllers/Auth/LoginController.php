<?php

namespace App\Http\Controllers\Auth;

use App\Data\Auth\LoginData;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;

class LoginController
{
    public function create()
    {
        return inertia('auth/login');
    }

    public function store(LoginData $data)
    {
        if (auth()->attempt([
            'email' => $data->email,
            'password' => $data->password,
        ], $data->remember)) {
            request()->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }
}
