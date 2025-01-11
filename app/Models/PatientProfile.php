<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'second_last_name',
        'birth_date',
        'gender_id',
        'blood_type_id',
        'phone',
        'address',
        'civil_status_id',
        'insurance_id',
        'risk_level_id',
        'nationality',
        'is_active',
        'occupation', // Si este campo es un string, mantenerlo aquí.
        'city_of_birth', // Referencia a la ciudad de nacimiento.
        'document_type_id', // Asegúrate de incluirlo aquí
        'document_id',      // Asegúrate de incluirlo aquí
    ];

    // **Casting para valores específicos**
    protected $casts = [
        'is_active' => 'boolean',
        'birth_date' => 'date',
    ];

    // **Relación con el Usuario**
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // **Relaciones con Lookups**
    public function civilStatus()
    {
        return $this->belongsTo(Lookup::class, 'civil_status_id');
    }

    public function insurance()
    {
        return $this->belongsTo(Lookup::class, 'insurance_id');
    }

    public function riskLevel()
    {
        return $this->belongsTo(Lookup::class, 'risk_level_id');
    }

    public function gender()
    {
        return $this->belongsTo(Lookup::class, 'gender_id');
    }

    public function bloodType()
    {
        return $this->belongsTo(Lookup::class, 'blood_type_id');
    }

    // **Relación con la Ciudad**
    public function cityOfBirth()
    {
        return $this->belongsTo(City::class, 'city_of_birth');
    }
}
