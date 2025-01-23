<?php

namespace App\Livewire\Admin\User;


use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use TallStackUi\Traits\Interactions;
use Illuminate\Validation\Rules\Password;

class UserSave extends Component
{
    use Interactions;
    public $id;
    public $user;
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public bool $slide = false;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->id),
            ],
            'password' => ['nullable', Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string' => 'O e-mail deve ser uma string.',
            'email.lowercase' => 'O e-mail deve estar em letras minúsculas.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
            'email.unique' => 'O e-mail já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
        ];
    }


    #[On('editUser')]
    public function edit(User $user): void
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->slide = true;
    }

    public function save(): void
    {
        $validated = $this->validate();

        User::updateOrCreate(
            ['id' => $this->id],
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        $this->dispatch('pg:eventRefresh-user-table-zmf7mr-table');
        $this->toast()->success('Usuário salvo com sucesso')->send();
        $this->reset();
    }

    public function resetErrors(): void
    {
        $this->resetErrorBag();
    }


    public function render()
    {
        return view('livewire.admin.user.user-save');
    }
}
