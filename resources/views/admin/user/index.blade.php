<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Usuários') }}
            </h2>
            @livewire('admin.User.UserSave')
        </div>
    </x-slot>

    <x-custom.bf-card>
        @livewire('admin.User.UserTable')
    </x-custom.bf-card>
</x-app-layout>
