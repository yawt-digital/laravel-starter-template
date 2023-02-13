<?php

namespace App\Http\Controllers\Auth;

use App\Data\Auth\RegisterData;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class RegisterController
{
    public function create()
    {
        return inertia('auth/register');
    }

    public function store(RegisterData $data)
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        event(new Registered($user));

        auth()->login($user, true);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
