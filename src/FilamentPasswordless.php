<?php

namespace BradyRenting\FilamentPasswordless;

class FilamentPasswordless
{
    protected string $authenticableModel;

    public function __construct()
    {
        $this->authenticableModel = config('filament-passwordless.authenticable_model');
    }
}
