<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rams extends Model
{
    protected $fillable = [
        'title',
        'description',
        'vendor_id',
        'count_of_modules',
        'memory_capacity_id',
        'memory_type_id',
    ];

    public function configuration() {
        return $this->hasMany(Configuration::class, 'ram_id');
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }

    public function memoryCapacity() {
        return $this->belongsTo(MemoryCapacity::class);
    }

    public function memoryType() {
        return $this->belongsTo(MemoryType::class);
    }
}
