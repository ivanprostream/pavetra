<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lang::create([
            'name' => 'Беларусь',
            'url' => 'by',
            'is_active' => 1
        ],
        [
            'name' => 'Poland',
            'url' => 'pl',
            'is_active' => 1
        ],
        [
            'name' => 'England/USA',
            'url' => 'en',
            'is_active' => 1
        ]);
    }
}
