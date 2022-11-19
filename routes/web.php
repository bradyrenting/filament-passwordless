<?php

use BradyRenting\FilamentPasswordless\Http\Controllers\HandleMagicLinkController;
use Illuminate\Support\Facades\Route;

Route::domain(config('filament.domain'))
    ->prefix(config('filament.path'))
    ->name('filament.auth.login.')
    ->group(function () {

        // Magic link route...
        Route::get('/login/magic-link/{model}/{remember?}', HandleMagicLinkController::class)
            ->middleware('signed')
            ->name('magic-link');

    });
