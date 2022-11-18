<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sections = [
            [
                'id' => 1,
                'section_name' => 'clothing',
                'status' => 1
            ],
            [
                'id' => 2,
                'section_name' => 'electronics',
                'status' => 1
            ],
            [
                'id' => 3,
                'section_name' => 'appliances',
                'status' => 0
            ],
        ];

        Section::insert($sections);
    }
}
