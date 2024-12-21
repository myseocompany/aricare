<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CompanyType extends Model
{
    protected $fillable = ['name'];

    public function companyProfiles(): HasMany
    {
        return $this->hasMany(CompanyProfile::class, 'company_type_id');
    }
}
