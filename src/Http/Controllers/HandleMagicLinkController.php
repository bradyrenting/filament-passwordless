<?php

namespace BradyRenting\FilamentPasswordless\Http\Controllers;

use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\LoginResponse;
use Illuminate\Database\Eloquent\Model;

class HandleMagicLinkController
{
    public function __invoke(Model $model, bool $remember = false): LoginResponse
    {
        Filament::auth()->login($model->getKey(), $remember);

        return app(LoginResponse::class);
    }
}
