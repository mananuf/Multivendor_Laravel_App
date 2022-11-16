<?php

namespace Database\Seeders;

use App\Models\VendorBankDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorBankDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendorBankDetails = [
            [
                'vendor_id' => 1,
                'account_holder_name' => 'mananaf bankat',
                'bank_name' => 'First Bank',
                'account_number' => '3074231961',
            ]
        ];

        VendorBankDetail::insert($vendorBankDetails);
    }
}
