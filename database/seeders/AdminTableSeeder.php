<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $super_admin = [
            [
                'name' => 'Super Admin',
                'type' => 'superadmin',
                'vendor_id' => 0,
                'phone' => '07038555803',
                'email' => 'admin@eshop.com',
                'password' => '$2y$10$g/i3BItIxvbfXjUSIKlzhOkjMBP0ZKmpcoC5Yr/bkoA7C/zBvr29u',
                'image' => '',
                'status' => 1
            ]
        ];

        Admin::insert($super_admin);
    }
}
