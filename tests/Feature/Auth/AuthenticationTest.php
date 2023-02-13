<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('login screen can be rendered', function () {
    get(route('login'))
        ->assertSuccessful();
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
    ])
        ->assertRedirect(RouteServiceProvider::HOME);

    assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    post(route('login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    assertGuest();
});
