<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'type_id', // Relación con la tabla de lookup
        'name',
        'description',
        'multi_patient',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function type()
    {
        return $this->belongsTo(ResourceType::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
