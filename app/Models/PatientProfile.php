<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lookup;


class PatientProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'birth_date',
        'gender',
        'blood_type',
        'phone',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function civilStatus()
{
    return $this->belongsTo(Lookup::class, 'civil_status_id');
}

public function occupation()
{
    return $this->belongsTo(Lookup::class, 'occupation_id');
}

public function insurance()
{
    return $this->belongsTo(Lookup::class, 'insurance_id');
}

public function riskLevel()
{
    return $this->belongsTo(Lookup::class, 'risk_level_id');
}

}
