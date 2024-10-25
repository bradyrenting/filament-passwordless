<?php

namespace BradyRenting\FilamentPasswordless\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use BradyRenting\FilamentPasswordless\FilamentPasswordlessServiceProvider;
use BradyRenting\FilamentPasswordless\Tests\Models\User;
use Filament\Actions\ActionsServiceProvider;
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

        $this->withoutExceptionHandling();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'BradyRenting\\FilamentPasswordless\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );

        $this->artisan('view:clear');
        // This call is needed as the capture directive is not loaded in the test environment which results in the
        // $content variable holding a closure being null
        $this->app['view']->prependNamespace('filament-forms', [
            __DIR__.'/__mocks__/resources/views/vendor/filament/forms',
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            SupportServiceProvider::class,
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            TablesServiceProvider::class,
            BladeIconsServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            ActionsServiceProvider::class,
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
