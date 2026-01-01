<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicSettingField extends Model
{
    use HasFactory;

    protected $table = 'dynamic_settings_fields';

    protected $fillable = [
        'key',
        'title',
        'content',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Scope to get only active fields
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order fields
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
