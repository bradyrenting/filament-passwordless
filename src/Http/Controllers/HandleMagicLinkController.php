<?php

namespace BradyRenting\FilamentPasswordless\Http\Controllers;

use BradyRenting\FilamentPasswordless\FilamentPasswordlessPlugin;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Illuminate\Routing\Controller;

class HandleMagicLinkController extends Controller
{
    public function __invoke(string $key, bool $remember = false): LoginResponse
    {
        $model = app(FilamentPasswordlessPlugin::class)->getModelByRouteKey($key);

        Filament::auth()->login($model, $remember);

        return app(LoginResponse::class);
    }
}
