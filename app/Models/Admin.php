<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    // guard
    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'type',
        'vendor_id',
        'phone',
        'email',
        'password',
        'image',
        'status'
    ];

    public function vendorPersonal(): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function vendorBusiness(): BelongsTo
    {
        return $this->belongsTo(VendorsBusinessDetail::class, 'vendor_id');
    }

    public function vendorBank(): BelongsTo
    {
        return $this->belongsTo(VendorBankDetail::class, 'vendor_id');
    }
}
