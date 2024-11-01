<?php

namespace BradyRenting\FilamentPasswordless\Tests\__mocks__\src\Http\Livewire\Auth;

use BradyRenting\FilamentPasswordless\Http\Livewire\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    public function hasLogo(): bool
    {
        // As we are testing the domain logic of the login, we disable the logo to bypass the logo rendering
        return false;
    }
}
