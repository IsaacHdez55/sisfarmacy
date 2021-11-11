<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Theme;
use App\Models\Invoice;
use App\Models\Location;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([

            'name' => 'Farmaceutica 2',
            'contact_person' => 'Antonio Duran',
            'address' => 'Avenida Aitana, 8, 3º A, 08562, Saldivar Medio',
            'country' => 'Colombia',
            'city' => 'Bogotá',
            'state' => 'Cundinamarca',
            'postal_code' => '9920',
            'email' => 'mateo90@veliz.com.es',
            'phone' => '981-72-2023',
            'mobile' => '981-72-2023',
            'fax' => '114.128.130.246',
            'website' => 'https://www.google.com/',
            
        ]);

        Invoice::create([

            'prefix' => 'INV',
            'invoice_logo' => '202111030156logo3.png',
            'tax' => '19',
            
        ]);

        Location::create([

            'timezone' => 'America/Bogota',
            'language' => 'English',
            'currency_symbol' => '$',
            
        ]);

        Theme::create([

            'website_name' => 'DOC',
            'light_logo' => '202111030216logo.png',
            'favicon' => '202111030141favicon.png',
            
        ]);
    }
}
