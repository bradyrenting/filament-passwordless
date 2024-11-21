<?php

namespace BradyRenting\FilamentPasswordless\Tests;

use BradyRenting\FilamentPasswordless\FilamentPasswordlessPlugin;
use BradyRenting\FilamentPasswordless\FilamentPasswordlessServiceProvider;
use BradyRenting\FilamentPasswordless\Tests\__mocks__\Models\User;
use Filament\Actions\ActionsServiceProvider;
use Filament\Facades\Filament;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Panel;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Session\Middleware\StartSession;
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

        $this->app?->make(Kernel::class)->pushMiddleware(StartSession::class);

        // This call is needed as the capture directive is not loaded in the test environment which results in the
        // $content variable holding a closure being null
        $this->app['view']->prependNamespace('filament-forms', [
            __DIR__.'/__mocks__/resources/views/vendor/filament/forms',
        ]);
    }

    protected function registerTestPanel(): void
    {
        Filament::registerPanel(
            fn (): Panel => Panel::make()
                ->default()
                ->id('test')
                ->path('test')
                ->plugin(FilamentPasswordlessPlugin::make()),
        );
    }

    protected function getPackageProviders($app)
    {
        $this->registerTestPanel();

        return [
            FilamentServiceProvider::class,
            FilamentPasswordlessServiceProvider::class,
            LivewireServiceProvider::class,
            ActionsServiceProvider::class,
            FormsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('app.key', 'base64:b4iPEgqctHoMGyCQTAGdah/pKHw+PyxjCUcJyDyCHE0=');
        config()->set('database.default', 'testing');

        config()->set('filament-passwordless.model', User::class);

        $migration = include __DIR__.'/__mocks__/database/migrations/create_test_tables.php.stub';
        $migration->up();
    }
}
