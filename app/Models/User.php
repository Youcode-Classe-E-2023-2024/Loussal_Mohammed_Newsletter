<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory, SoftDeletes, HasPermissions;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    const Role_MEMBER  = 'Member';
    const Role_REDACT  = 'Redact';
    const Role_ADMIN  = 'admin';

    public function hasAnyRole($roles): bool
    {
        return in_array($this->role, $roles);
    }

    public function admin() {
        return $this->hasOne(admin::class);
    }
    public function redactor() {
        return $this->hasOne(redactor::class);
    }
    public function member() {
        return $this->hasOne(member::class);
    }


    protected $guarded = [
        'id',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_confirmed_at',
        'remember_token',
        'created_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
