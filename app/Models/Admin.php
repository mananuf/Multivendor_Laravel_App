<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
