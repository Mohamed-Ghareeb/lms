<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    /** @use HasFactory<\Database\Factories\PlanFactory> */
    use HasFactory;

    protected $appends = [
        'name_by_lang',
        'slug_by_lang',
        'description_by_lang',
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'duration_days',
        'is_active',
    ];

    protected $casts = [
        'name'        => 'array',
        'slug'        => 'array',
        'description' => 'array',
        'is_active'   => 'boolean',
    ];

    public function getNameByLangAttribute()
    {
        return getColumnLang($this->name);
    }

    public function getSlugByLangAttribute()
    {
        return getColumnLang($this->slug);
    }

    public function getDescriptionByLangAttribute()
    {
        return getColumnLang($this->description);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
