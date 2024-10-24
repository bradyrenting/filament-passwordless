<?php

namespace BradyRenting\FilamentPasswordless\Tests\Models;

use BradyRenting\FilamentPasswordless\Tests\Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory;

    protected $table = 'filament_passwordless_users';

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    public function canAccessFilament(): bool
    {
        return true;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
