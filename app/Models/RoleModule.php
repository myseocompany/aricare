<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleModule extends Pivot
{
    use HasFactory;

    protected $table = 'role_modules';

    protected $fillable = [
        'role_id',
        'module_id',
        'created',
        'readed',
        'updated',
        'deleted',
        'list',
    ];

    /**
     * Relación con el rol.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relación con el módulo.
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
