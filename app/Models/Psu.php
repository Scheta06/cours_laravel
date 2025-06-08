<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Psu extends Model
{
    protected $fillable = [
        'title',
        'description',
        'vendor_id',
    ];

    public function configuration() {
        return $this->hasMany(Configuration::class, 'psu_id');
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
