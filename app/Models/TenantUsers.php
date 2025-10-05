<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantUsers extends Model
{
    /** @use HasFactory<\Database\Factories\TenantUsersFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'is_admin',
        'dob',
        'gender',
        'position',
        'salary',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];
}
