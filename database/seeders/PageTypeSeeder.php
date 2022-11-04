<?php

namespace Database\Seeders;

use App\Models\PageType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageType::create([
            'name' => 'Standart Page'
        ],
        [
            'name' => 'Sidebar Page'
        ],
        [
            'name' => 'Contact Page'
        ],
        [
            'name' => 'Blog Page'
        ],
        [
            'name' => 'Catalog Page'
        ],
        [
            'name' => 'Custom Page'
        ]);
    }
}
