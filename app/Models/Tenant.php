<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    /** @use HasFactory<\Database\Factories\TenantFactory> */
    use HasFactory;

    protected $appends = [
        'name_by_lang',
    ];

    protected $fillable = [
        'name',
        'slug',
        'database',
        'db_username',
        'db_password',
        'is_active',
        'free_trial_end_date',
    ];

    protected $casts = [
        'name'      => 'array',
        'is_active' => 'boolean',
    ];

    public function getNameByLangAttribute()
    {
        return getColumnLang($this->name);
    }
}
