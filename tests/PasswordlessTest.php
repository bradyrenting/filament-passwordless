<?php

use BradyRenting\FilamentPasswordless\Http\Livewire\Auth\Login;
use BradyRenting\FilamentPasswordless\Tests\Database\Factories\UserFactory;
use Filament\Facades\Filament;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

beforeEach(function () {
    $guard = Mockery::mock(Guard::class);
    $guard->shouldReceive('check')->once()->andReturn(false);
    Filament::shouldReceive('auth')
        ->once()
        ->andReturn($guard);
});

it('can be mounted', function () {
    Livewire::test(Login::class)->assertSuccessful();
});

it('can submit login form but email does not exist', function () {
    Mail::fake();

    Livewire::test(Login::class)
        ->set('email', 'john@example.net')
        ->call('authenticate')
        ->assertSet('submitted', true)
        ->assertHasNoErrors();

    $mailableClass = config('filament-passwordless.mailable_for_magic_link');

    Mail::assertNotQueued($mailableClass);
});

it('can submit login form and send a magic link', function () {
    $user = UserFactory::new()->create();

    Mail::fake();

    Livewire::test(Login::class)
        ->set('email', $user->email)
        ->call('authenticate')
        ->assertSet('submitted', true)
        ->assertHasNoErrors();

    $mailableClass = config('filament-passwordless.mailable_for_magic_link');

    Mail::assertQueued($mailableClass);
});
