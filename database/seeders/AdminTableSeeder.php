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
                'password' => '$2y$10$S.afxqox.l.DJmOzJjS/k.NWoIKjiQQYssZIiQ5XPIz79v7EcPKpe',
                'image' => '',
                'status' => 1
            ]
        ];

        Admin::insert($super_admin);
    }
}
