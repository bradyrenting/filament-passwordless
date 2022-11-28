<?php

namespace BradyRenting\FilamentPasswordless\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use BradyRenting\FilamentPasswordless\FilamentPasswordlessServiceProvider;
use BradyRenting\FilamentPasswordless\Tests\Models\User;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'BradyRenting\\FilamentPasswordless\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            SupportServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            TablesServiceProvider::class,
            BladeIconsServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            FilamentPasswordlessServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('app.key', 'base64:b4iPEgqctHoMGyCQTAGdah/pKHw+PyxjCUcJyDyCHE0=');
        config()->set('database.default', 'testing');

        config()->set('filament-passwordless.model', User::class);

        $migration = include __DIR__.'/database/migrations/create_test_tables.php.stub';
        $migration->up();
    }
}
