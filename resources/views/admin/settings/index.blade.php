<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Confirgurações do Site') }}
            </h2>
            <a href="{{ route('clear.cache') }}" class="rounded bg-indigo-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Limpar Cache</a>
        </div>
        @livewire('admin.Settings.SettingsSave')
    </x-slot>
    @if(session('success'))
        @include('components.success')
    @endif

    <x-custom.bf-card>
        @livewire('admin.settings.settings-table')
    </x-custom.bf-card>
</x-app-layout>
