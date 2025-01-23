<form {{ $attributes }}>
    {{ $slot }}

    <div class="flex justify-end mt-4 gap-4">
        {{ $actions }}

        <x-button wire:click.prevent="$toggle('slide')" color="secondary">
            Fechar
        </x-button>
    </div>
</form>