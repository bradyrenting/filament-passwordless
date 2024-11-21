<?php

use BradyRenting\FilamentPasswordless\Http\Controllers\HandleMagicLinkController;
use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;

foreach (Filament::getPanels() as $panel) {
    if (! $panel->hasPlugin('filament-passwordless')) {
        continue;
    }

    $path = $panel->getPath();
    $loginSlug = $panel->getLoginRouteSlug();

    $domains = $panel->getDomains();

    foreach ((empty($domains) ? [null] : $domains) as $domain) {
        Filament::currentDomain($domain);

        Route::domain($domain)
            ->middleware($panel->getMiddleware())
            ->prefix($path)
            ->name('filament.auth.login.')
            ->group(function () use ($loginSlug) {
                // Magic link route
                Route::get("$loginSlug/magic-link/{key}/{remember?}", HandleMagicLinkController::class)
                    ->middleware('signed')
                    ->name('magic-link');
            });

        Filament::currentDomain(null);
    }
}
