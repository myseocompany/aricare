<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'start_time',
        'end_time',
        'patient_id',
        'doctor_id',
        'team_id',
        'branch_id',
        'reason',
        'description',
    ];

    /**
     * Relación con el modelo `Branch`.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Relación con el modelo `User` para el paciente.
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * Relación con el modelo `User` para el doctor.
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    /**
     * Relación con el modelo `Team`.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
