<?php

namespace BradyRenting\FilamentPasswordless;

use BradyRenting\FilamentPasswordless\Http\Livewire\Auth;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;

class FilamentPasswordlessServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-passwordless';

    public function packageBooted(): void
    {
        parent::packageBooted();

        Livewire::component('brady-renting.filament-passwordless.http.livewire.auth.login', Auth\Login::class);
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasRoute('web')
            ->hasTranslations()
            ->hasViews();
    }
}
