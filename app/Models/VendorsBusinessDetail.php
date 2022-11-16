<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorsBusinessDetail extends Model
{
    use HasFactory;
    protected $table = 'vendors_business_details';
    protected $fillable = [
        'vendor_id',
        'shop_name',
        'shop_address',
        'shop_city',
        'shop_state',
        'shop_country',
        'shop_ncontact',
        'shop_email',
        'shop_website',
        'address_proof',
        'address_image',
        'business_license_number',
    ];
}
