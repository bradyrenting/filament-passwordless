<?php

namespace BradyRenting\FilamentPasswordless;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class MagicLink
{
    public Model $model;

    public bool $remember;

    public string $url;

    public static function create(Model $model, bool $remember = false): static
    {
        return new static($model, $remember);
    }

    public function __construct(Model $model, $remember = false)
    {
        $this->model = $model;

        $this->remember = $remember;

        $this->url = $this->generateUrl();
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    protected function generateUrl(): string
    {
        return URL::temporarySignedRoute(
            name: 'filament.auth.login.magic-link',
            expiration: now()->addMinutes(config('filament-passwordless.expires_after')),
            parameters: [
                'model'  => $this->model->getRouteKey(),
                'remember' => $this->remember,
            ]
        );
    }
}
