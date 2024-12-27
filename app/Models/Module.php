<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Module extends Model{
	use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relación con los roles a través de la tabla role_modules.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_modules')
            ->withPivot('created', 'readed', 'updated', 'deleted', 'list')
            ->withTimestamps();
    }
}