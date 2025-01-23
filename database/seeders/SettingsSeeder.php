<?php

namespace Database\Seeders;

use App\Models\Admin\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'name' => 'Site Exemplo',
            'address' => 'Avenida Borges de Medeiros 2889',
            'address_complement' => 'Sala 108',
            'address_city' => 'Gramado',
            'address_state' => 'RS',
            'phone' => '(54)3286-3000',
            'email' => 'email@email.com',
            'opening_hours' => 'De segunda a sábado das 09h as 18h',
            'whatasapp_number' => ' (54) 99635-5445',
            'whatasapp_link' => 'https://api.whatsapp.com/send/?phone=5554996355445&text=Ol%C3%A1%21+Estou+vindo+do+Portal+Gramado.&type=phone_number&app_absent=0',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3476.7544251524155!2d-50.87337528929641!3d-29.37747887516306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9519325b7409e967%3A0xe299bc5cc67e884!2sGRUPO%20PORTAL%20GRAMADO%20LTDA!5e0!3m2!1spt-BR!2sbr!4v1690305747955!5m2!1spt-BR!2sbr'
        ]);
    }
}
