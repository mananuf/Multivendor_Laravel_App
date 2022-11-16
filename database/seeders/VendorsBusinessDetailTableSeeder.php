<?php

namespace Database\Seeders;

use App\Models\VendorsBusinessDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBusinessDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendorsBusinessDetails = [
            [
                'vendor_id' => 1,
                'shop_name' => '3pplem Tech.',
                'shop_address' => 'TAEN Complex, Old Airport',
                'shop_city' => 'Jos',
                'shop_state' => 'Plateau',
                'shop_country' => 'Nigeria',
                'shop_contact' => '07038555803',
                'shop_email' => 'admin@3pplem.com',
                'shop_website' => 'www.tripplem.com',
                'address_proof' => '',
                'address_image' => '',
                'business_license_number' => 'BC0248',
            ]
        ];

        VendorsBusinessDetail::insert($vendorsBusinessDetails);
    }
}
