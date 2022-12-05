<?php

namespace BradyRenting\FilamentPasswordless;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class MagicLink
{
    protected Model $model;

    protected bool $remember;

    protected int $expiry;

    protected string $url;

    public static function create(Model $model, bool $remember = false): static
    {
        return new static($model, $remember);
    }

    public function __construct(Model $model, $remember = false)
    {
        $this->model = $model;

        $this->remember = $remember;

        $this->expiry = config('filament-passwordless.magic_link_expiry', 10);

        $this->generateUrl();
    }

    public function getExpiry(): int
    {
        return $this->expiry;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    protected function generateUrl(): void
    {
        $url = URL::temporarySignedRoute(
            name: 'filament.auth.login.magic-link',
            expiration: now()->addMinutes($this->getExpiry()),
            parameters: [
                'key' => $this->model->getRouteKey(),
                'remember' => $this->remember,
            ]
        );

        $this->url = $url;
    }
}
