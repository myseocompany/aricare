<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_user')
                    ->withPivot('team_id')
                    ->withTimestamps();
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'role_modules')
            ->withPivot('created', 'readed', 'updated', 'deleted', 'list')
            ->withTimestamps();
    }

}
