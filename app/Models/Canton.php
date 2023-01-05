<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'province_id'
    ];

    public function province() {
        return $this->belongsTo('App\Models\Province');
    }

    public function district() {
        return $this->hasMany('App\Models\District');
    }
}
