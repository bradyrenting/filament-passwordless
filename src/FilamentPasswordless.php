<?php

namespace BradyRenting\FilamentPasswordless;

use Illuminate\Database\Eloquent\Model;

class FilamentPasswordless
{
    protected string $authenticatableModel;

    public function __construct()
    {
        $this->authenticatableModel = config('filament-passwordless.authenticatable_model');
    }

    public function getAuthenticatableModel(string $email): ?Model
    {
        return $this->authenticatableModel::query()
            ->where('email', $email)
            ->first();
    }
}
