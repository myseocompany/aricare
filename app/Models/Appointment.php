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
        'resource_id',
        'reason',
        'type_id',
        'block_type_id', 
        'block_end_date', 
        'description',
        'clinical_notes',
        'is_completed',
        'attention_date',
    ];

    // Configurar los campos como fechas
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'block_end_date' => 'date', // Cast para block_end_date
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

    public function type()
    {
        return $this->belongsTo(AppointmentType::class, 'type_id');
    }

}
