<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    function users()
    {
        return $this->belongsToMany(User::class);
    }
    function permissions()
    {
        return $this->belongsToMany(permission::class);
    }
}
