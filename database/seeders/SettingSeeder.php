<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'lang_id' => 1,
            'module' => 'Контакты',
            'key_1' => 'Телефон',
            'value_1' => '+375 29 435-54-33',
            'key_2' => 'Facebook',
            'value_2' => 'paveralab',
            'key_3' => 'E-mail',
            'value_3' => 'info@pavetra.org',
        ],
        [
            'lang_id' => 1,
            'module' => 'Łączność',
            'key_1' => 'Telefon',
            'value_1' => '+375 29 435-54-33',
            'key_2' => 'Facebook',
            'value_2' => 'paveralab',
            'key_3' => 'E-mail',
            'value_3' => 'info@pavetra.org',
        ],
        [
            'lang_id' => 2,
            'module' => 'Contacts',
            'key_1' => 'Mobile phone',
            'value_1' => '+375 29 435-54-33',
            'key_2' => 'Facebook',
            'value_2' => 'paveralab',
            'key_3' => 'E-mail',
            'value_3' => 'info@pavetra.org',
        ]);
    }
}
