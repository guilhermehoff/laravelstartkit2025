<div>
    <x-slide size="5xl" title="Configurações do Site" wire x-on:open="$wire.resetErrors()">
        <x-custom.bf-form wire:submit.prevent="save">

            <div class="grid grid-cols-9 mt-2">
                <div class="col-span-3 mr-1">
                    <x-upload label="Logo" wire:model="logo"/>
                </div>
                <div class="col-span-3 mr-1">
                    <x-upload label="Logo Rodapé" wire:model="logo_footer"/>
                </div>
                <div class="col-span-3 ml-1">
                    <x-upload label="Favicon" wire:model="favicon"/>
                </div>
            </div>

            <div class="grid grid-cols-6 mt-2">
                <div class="col-span-3 mr-1">
                    <x-input label="Nome *" wire:model="name"/>
                </div>
                <div class="col-span-3 ml-1">
                    <x-input label="Endereço" wire:model="address"/>
                </div>
            </div>

            <div class="grid grid-cols-9 mt-2">
                <div class="col-span-3">
                    <x-input label="Complemento" wire:model="address_complement"/>
                </div>
                <div class="col-span-3 mr-1 ml-1">
                    <x-input label="Cidade" wire:model="address_city"/>
                </div>
                <div class="col-span-3">
                    <x-input label="Estado" wire:model="address_state"/>
                </div>
            </div>

            <div class="grid grid-cols-9 mt-2">
                <div class="col-span-3">
                    <x-input label="Telefone" wire:model="phone"/>
                </div>
                <div class="col-span-3 mr-1 ml-1">
                    <x-input label="E-mail" wire:model="email"/>
                </div>
                <div class="col-span-3">
                    <x-input label="Whatsapp" wire:model="whatasapp_number"/>
                </div>
            </div>

            <div class="mt-2">
                <x-input label="Horário de Atendimento" wire:model="opening_hours"/>
            </div>

            <div class="mt-2">
                <x-textarea label="Quem Somos" wire:model="who_we_are"/>
            </div>

            <div x-data="{ showComponent: false }">
                <div class="flex mt-3">
                    <button type="button" @click="showComponent = !showComponent" class="whitespace-normal font-medium text-md text-secondary-600 dark:text-dark-300 mt-3 mb-3 flex items-center">
                        Redes Sociais
                        <div class="ml-3 bg-blue-500 rounded-full inline-flex p-1 justify-center items-center">
                            <svg :class="showComponent ? 'transform rotate-90 text-base' : 'text-base'" class="h-5 w-5 shrink-0 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </div>
                <div x-show="showComponent">
                    <x-input label="Link do Whatsapp" wire:model="whatasapp_link"/>

                    <x-input label="Link do Google Maps" wire:model="whatasapp_link"/>

                    <x-input label="Link do Facebook" wire:model="facebook"/>

                    <x-input label="Link do Instagram" wire:model="instagram"/>

                    <x-input label="Link do Youtube" wire:model="youtube"/>
                </div>
            </div>

            <x-slot name="actions">
                <x-button type="submit" color="blue">
                    Salvar
                </x-button>
            </x-slot>
        </x-custom.bf-form>
    </x-slide>
</div>
