<?php

namespace App\Livewire\Admin\Settings;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Admin\Setting;
use TallStackUi\Traits\Interactions;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class SettingsSave extends Component
{
    use Interactions, WithFileUploads;

    public $id;
    public $name;
    public $logo;
    public $logo_footer;
    public $favicon;
    public $address;
    public $address_complement;
    public $address_city;
    public $address_state;
    public $phone;
    public $email;
    public $opening_hours;
    public $whatasapp_number;
    public $who_we_are;
    public $whatasapp_link;
    public $google_maps;
    public $facebook;
    public $instagram;
    public $linkedin;
    public $twitter;
    public $youtube;
    public bool $slide = false;

    public function rules(): array
    {
        return [
            'name'               => 'required|max:50',
            'address'            => 'nullable|string',
            'address_complement' => 'nullable|string',
            'address_city'       => 'nullable|string',
            'address_state'      => 'nullable|string',
            'phone'              => 'nullable|string',
            'email'              => 'nullable|email',
            'opening_hours'      => 'nullable|string',
            'whatasapp_number'   => 'nullable|string',
            'whatasapp_link'     => 'nullable|url',
            'who_we_are'         => 'nullable|string|max:200',
            'google_maps'        => 'nullable|url',
            'facebook'           => 'nullable|url',
            'instagram'          => 'nullable|url',
            'linkedin'           => 'nullable|url',
            'twitter'            => 'nullable|url',
            'youtube'            => 'nullable|url',
        ];

    }

    public function messages(): array
    {
        return [

            'name.required'               => 'O nome do site é obrigatório',
            'name.max'                    => 'O nome do site não pode ser mais de 60 caracteres',
            'whatasapp_link.url'          => 'O link do whatsapp não é válido',
            'google_maps.url'             => 'O link do google maps não é válido',
            'facebook.url'                => 'O link do facebook não é válido',
            'instagram.url'               => 'O link do instagram não é válido',
            'linkedin.url'                => 'O link do linkedin não é válido',
            'twitter.url'                 => 'O link do twitter não é válido',
            'youtube.url'                 => 'O link do youtube não é válido',
            'who_we_are.max'              => 'Quem Somos deve ter no máximo 200 caracteres',

        ];
    }

    #[On('editSiteSetting')]
    public function edit(Setting $siteSetting)
    {
        $this->id = $siteSetting->id;
        $this->name = $siteSetting->name;
        $this->address = $siteSetting->address;
        $this->address_complement = $siteSetting->address_complement;
        $this->address_city = $siteSetting->address_city;
        $this->address_state = $siteSetting->address_state;
        $this->phone = $siteSetting->phone;
        $this->email = $siteSetting->email;
        $this->opening_hours = $siteSetting->opening_hours;
        $this->whatasapp_number = $siteSetting->whatasapp_number;
        $this->whatasapp_link = $siteSetting->whatasapp_link;
        $this->who_we_are = $siteSetting->who_we_are;
        $this->google_maps = $siteSetting->google_maps;
        $this->facebook = $siteSetting->facebook;
        $this->instagram = $siteSetting->instagram;
        $this->linkedin = $siteSetting->linkedin;
        $this->twitter = $siteSetting->twitter;
        $this->youtube = $siteSetting->youtube;
        $this->slide = true;

    }

    public function save(): void
    {
        $validated = $this->validate();
        $siteSetting = Setting::find($this->id);
        $appName = env('APP_NAME');
        $sanitizedAppName = strtolower(preg_replace('/[^a-z0-9]/', '', $appName));

        if ($this->logo) {
            // Delete previous logo if exists
            if ($siteSetting && $siteSetting->logo) {
                Storage::disk('s3')->delete($siteSetting->logo);
            }
            $logoPath = $this->logo->store($sanitizedAppName  . '/logos', 's3');
            $validated['logo'] = $logoPath;
        } elseif ($siteSetting) {
            $validated['logo'] = $siteSetting->logo;
        }

        if ($this->logo_footer) {
            // Delete previous logo if exists
            if ($siteSetting && $siteSetting->logo_footer) {
                Storage::disk('s3')->delete($siteSetting->logo_footer);
            }
            $logoFooterPath = $this->logo_footer->store($sanitizedAppName  . '/logos', 's3');
            $validated['logo_footer'] = $logoFooterPath;
        } elseif ($siteSetting) {
            $validated['logo_footer'] = $siteSetting->logo_footer;
        }

        if ($this->favicon) {
            // Delete previous favicon if exists
            if ($siteSetting && $siteSetting->favicon) {
                Storage::disk('s3')->delete($siteSetting->favicon);
            }
            $faviconPath = $this->favicon->store($sanitizedAppName  . '/favicons', 's3');
            $validated['favicon'] = $faviconPath;
        } elseif ($siteSetting) {
            $validated['favicon'] = $siteSetting->favicon;
        }

        Setting::updateOrCreate(
            ['id' => $this->id],
            [
                'name' => $validated['name'],
                'logo' => $validated['logo'] ?? null,
                'logo_footer' => $validated['logo_footer'] ?? null,
                'favicon' => $validated['favicon'] ?? null,
                'address' => $validated['address'],
                'address_complement' => $validated['address_complement'],
                'address_city' => $validated['address_city'],
                'address_state' => $validated['address_state'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'opening_hours' => $validated['opening_hours'],
                'whatasapp_number' => $validated['whatasapp_number'],
                'whatasapp_link' => $validated['whatasapp_link'],
                'who_we_are' => $validated['who_we_are'],
                'google_maps' => $validated['google_maps'],
                'facebook' => $validated['facebook'],
                'instagram' => $validated['instagram'],
                'linkedin' => $validated['linkedin'],
                'twitter' => $validated['twitter'],
                'youtube' => $validated['youtube'],
            ]
        );

        $this->dispatch('pg:eventRefresh-settings-table-7bq6py-table');
        $this->toast()->success('Registro atualizado com sucesso!')->send();
        $this->reset();
    }

    public function resetErrors(): void
    {
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.settings.settings-save');
    }
}
