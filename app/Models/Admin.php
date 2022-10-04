<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth\User as Authenticatable;

class Admin extends Model
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
