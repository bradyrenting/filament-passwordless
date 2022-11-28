<?php

use BradyRenting\FilamentPasswordless\Http\Livewire\Auth\Login;
use BradyRenting\FilamentPasswordless\Tests\Database\Factories\UserFactory;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

it('can be mounted', function () {
    Livewire::test(Login::class)
        ->assertSuccessful();
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
