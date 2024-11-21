<?php
 
namespace BradyRenting\FilamentPasswordless;
 
use BradyRenting\FilamentPasswordless\Http\Livewire\Auth\Login;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class FilamentPasswordlessPlugin implements Plugin
{
    protected string $model;

    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'filament-passwordless';
    }
 
    public function register(Panel $panel): void
    {
        $panel
            ->authGuard(env('FILAMENT_AUTH_GUARD', 'web'))
            ->login(Login::class);
    }
 
    public function boot(Panel $panel): void
    {
        $this->model = config('filament-passwordless.model');
    }

    public function getModel(string $email): ?Authenticatable
    {
        return $this->model::query()
            ->where('email', $email)
            ->first();
    }

    public function getModelByRouteKey(string $key): Authenticatable
    {
        $routeKeyName = (new $this->model)->getRouteKeyName();

        return $this->model::query()
            ->where($routeKeyName, $key)
            ->first();
    }
}
