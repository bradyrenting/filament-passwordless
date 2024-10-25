@php
    use Filament\Support\Facades\FilamentView;
    use Filament\View\PanelsRenderHook;
@endphp
<x-filament-panels::page.simple>
    @if(session()->has('danger'))
        <div class="p-4 mb-4 text-sm text-danger-700 bg-danger-500/10 rounded-lg dark:bg-danger-900/50 dark:text-danger-700"
             role="alert">
            {{ session('danger') }}
        </div>
    @endif

    {{ FilamentView::renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

    @if(! $this->submitted)
        <x-filament-panels::form id="form" wire:submit.prevent="authenticate">
            @csrf
            {{ $this->form }}

            <x-filament-panels::form.actions
                    :actions="$this->getCachedFormActions()"
                    :full-width="$this->hasFullWidthFormActions()"
            />
        </x-filament-panels::form>
    @else
        <p>
            {{ __('filament-passwordless::filament-passwordless.messages.magic_link_sent') }}
        </p>
    @endif
    {{ FilamentView::renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}
</x-filament-panels::page.simple>
