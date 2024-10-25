<?php

namespace BradyRenting\FilamentPasswordless\Tests\__mocks__;

use BradyRenting\FilamentPasswordless\Http\Livewire\Auth\Login;

class PartialLoginMock extends Login
{
    public function hasLogo(): bool
    {
        // As we are testing the domain logic of the login, we disable the logo to bypass the logo rendering
        return false;
    }
}
