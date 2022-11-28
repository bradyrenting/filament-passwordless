<form wire:submit.prevent="authenticate" class="space-y-8">
    @if(session()->has('danger'))
        <div class="p-4 mb-4 text-sm text-danger-700 bg-danger-500/10 rounded-lg dark:bg-danger-900/50 dark:text-danger-700" role="alert">
            {{ session('danger') }}
        </div>
    @endif

    @if (! $this->submitted)
        {{ $this->form }}

        <x-filament::button type="submit" form="authenticate" class="w-full">
            {{ __('filament::login.buttons.submit.label') }}
        </x-filament::button>
    @else
        <p>
            {{ __('filament-passwordless::filament-passwordless.messages.magic_link_sent') }}
        </p>
    @endif
</form>
