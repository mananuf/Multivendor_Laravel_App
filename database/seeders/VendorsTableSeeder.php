<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendor = [
            [
                'name' => 'vendor one',
                'address' => 'block 56 state low-cost',
                'city' => 'jos',
                'state' => 'Plateau',
                'country' => 'Nigeria',
                'pincode' => '+234',
                'phone' => '07038555803',
                'email' => 'vendorone@eshop.com',
                'status' => 0
            ]
        ];

        Vendor::insert($vendor);
    }
}
