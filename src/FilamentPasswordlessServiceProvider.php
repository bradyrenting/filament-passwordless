<?php

namespace BradyRenting\FilamentPasswordless;

use BradyRenting\FilamentPasswordless\Http\Livewire\Auth;
use Filament\PluginServiceProvider;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;

class FilamentPasswordlessServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-passwordless';

    public function packageBooted(): void
    {
        parent::packageBooted();

        Livewire::component(Auth\Login::getName(), Auth\Login::class);
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
