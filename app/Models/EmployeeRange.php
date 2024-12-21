<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeRange extends Model
{
    protected $fillable = ['range'];

    public function companyProfiles(): HasMany
    {
        return $this->hasMany(CompanyProfile::class, 'employee_range_id');
    }
}
