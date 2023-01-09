<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Model_has_roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'model_type',
        'model_id',
    ];

    public function role ()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role');
    }

    public function user ()
    {
        return $this->belongsTo('App\Models\User');
    }
}
