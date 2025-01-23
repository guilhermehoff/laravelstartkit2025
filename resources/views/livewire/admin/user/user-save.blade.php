<div>
    <x-button wire:click="$toggle('slide')" color="blue" icon="plus"></x-button>

    <x-slide title="Usuários" wire x-on:open="$wire.resetErrors()">
        <x-custom.bf-form wire:submit.prevent="save">

            <x-input label="Nome *" wire:model="name"/>
            <x-input label="Email *" wire:model="email"/>

            <x-password label="Senha" wire:model="password"/>

            <x-slot name="actions">
                <x-button type="submit" color="blue">
                    Salvar
                </x-button>
            </x-slot>
        </x-custom.bf-form>
    </x-slide>
</div>
