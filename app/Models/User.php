<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isSuperAdmin(): bool
    {
        return $this->is_super_admin;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'team_user')
                    ->withPivot('team_id')
                    ->withTimestamps();
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_user', 'user_id', 'team_id')
                    ->withPivot('role_id', 'role')
                    ->withTimestamps();
    }
    
    public function hasRole($roleName, $teamId = null)
    {
        $query = $this->roles()->where('name', $roleName);
        if ($teamId) {
            $query->wherePivot('team_id', $teamId);
        }
        return $query->exists();
    }

    public function assignRole($roleName, $teamId)
    {
        $role = Role::where('name', $roleName)->firstOrFail();
        $this->teams()->attach($teamId, ['role_id' => $role->id, 'role' => $roleName]);
    }

    public function removeRole($roleName, $teamId)
    {
        $role = Role::where('name', $roleName)->firstOrFail();
        $this->teams()->detach($teamId, ['role_id' => $role->id]);
    }

    public function doctorProfile()
    {
        return $this->hasOne(DoctorProfile::class);
    }

    public function patientProfile()
    {
        return $this->hasOne(PatientProfile::class);
    }

}
