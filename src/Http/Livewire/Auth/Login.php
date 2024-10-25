<?php

namespace BradyRenting\FilamentPasswordless\Http\Livewire\Auth;

use BradyRenting\FilamentPasswordless\FilamentPasswordless;
use BradyRenting\FilamentPasswordless\MagicLink;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\SimplePage;
use Illuminate\Support\Facades\Mail;

use function __;
use function array_key_exists;

/**
 * @property Form $form
 */
class Login extends SimplePage
{
    use InteractsWithFormActions;
    use WithRateLimiting;

    public const RATE_LIMIT = 5;

    protected static string $view = 'filament-passwordless::login';

    public $data = [
        'email' => '',
        'remember' => false,
    ];

    public $submitted = false;

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        $this->form->fill();
    }

    public function authenticate()
    {
        try {
            $this->rateLimit(self::RATE_LIMIT);
        } catch (TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();

            return null;
        }

        $data = $this->form->getState();

        $model = app(FilamentPasswordless::class)->getModel($data['email']);

        if (! is_null($model)) {
            $magicLink = MagicLink::create($model, $data['remember']);

            $mailableClass = config('filament-passwordless.mailable_for_magic_link');

            Mail::to($model->email)->send(new $mailableClass(email: $model->email, magicLink: $magicLink));
        }

        $this->submitted = true;
    }

    protected function getRateLimitedNotification(TooManyRequestsException $exception): ?Notification
    {
        return Notification::make()
            ->title(__('filament-panels::pages/auth/login.notifications.throttled.title', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => $exception->minutesUntilAvailable,
            ]))
            ->body(array_key_exists(
                'body',
                __('filament-panels::pages/auth/login.notifications.throttled') ?: [])
                ? __(
                    'filament-panels::pages/auth/login.notifications.throttled.body', [
                        'seconds' => $exception->secondsUntilAvailable,
                        'minutes' => $exception->minutesUntilAvailable,
                    ]
                ) : null)
            ->danger();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label(__('filament-panels::pages/auth/login.form.email.label'))
                    ->email()
                    ->required()
                    ->autocomplete()
                    ->autofocus(),

                Checkbox::make('remember')
                    ->label(__('filament-panels::pages/auth/login.form.remember.label')),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('authenticate')
                ->label(__('filament-panels::pages/auth/login.form.actions.authenticate.label'))
                ->submit('authenticate'),
        ];
    }

    protected function hasFullWidthFormActions(): bool
    {
        return true;
    }
}
