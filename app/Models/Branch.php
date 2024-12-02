<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'name', 'address', 'phone', 'email'];

    public function schedules()
    {
        return $this->hasMany(BranchSchedule::class);
    }

    public function availabilities()
    {
        return $this->hasMany(BranchAvailability::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}

