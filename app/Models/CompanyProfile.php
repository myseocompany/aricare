<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'user_id',
        'teama_id',
=======
>>>>>>> 2428261 (Tablas de lookUp para cuenta de empresa)
        'company_type_id',
        'company_name',
        'employee_range_id',
        'phone',
        'country_id',
        'division_id',
        'city_id',
        'address',
        'user_id',
    ];

<<<<<<< HEAD
    public function employeeRange()
    {
        return $this->belongsTo(EmployeeRange::class, 'employee_range_id');
    }
=======
    public function employeeRange(): BelongsTo
    {
        return $this->belongsTo(EmployeeRange::class, 'employee_range_id');
    }

    public function companyType(): BelongsTo
    {
        return $this->belongsTo(CompanyType::class, 'company_type_id');
    }

>>>>>>> 2428261 (Tablas de lookUp para cuenta de empresa)
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

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class, 'company_type_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}
