<?php

namespace BradyRenting\FilamentPasswordless\Http\Controllers;

use BradyRenting\FilamentPasswordless\FilamentPasswordless;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Illuminate\Routing\Controller;

class HandleMagicLinkController extends Controller
{
    public function __invoke(string $key, bool $remember = false): LoginResponse
    {
        $model = app(FilamentPasswordless::class)->getModelByRouteKey($key);

        Filament::auth()->login($model, $remember);

        return app(LoginResponse::class);
    }
}
