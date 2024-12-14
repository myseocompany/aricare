<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_type',
        'company_name',
        'employee_number',
        'phone',
        'country_id',
        'division_id',
        'city_id',
        'address',
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el país
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Relación con la división
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    // Relación con la ciudad
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
