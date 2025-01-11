<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Modelo Country
    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}
