<?php

namespace BradyRenting\FilamentPasswordless;

use Filament\PluginServiceProvider;
use BradyRenting\FilamentPasswordless\Http\Livewire\Auth;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;

class FilamentPasswordlessServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-passwordless';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-filament-passwordless' => __DIR__.'/../resources/dist/filament-passwordless.css',
    ];

    protected array $scripts = [
        'plugin-filament-passwordless' => __DIR__.'/../resources/dist/filament-passwordless.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-filament-passwordless' => __DIR__ . '/../resources/dist/filament-passwordless.js',
    // ];

    public function packageBooted(): void
    {
        parent::packageBooted();

        Livewire::component(Auth\Login::getName(), Auth\Login::class);
    }

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }
}
