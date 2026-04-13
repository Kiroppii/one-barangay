<?php

namespace App\Models;

// 1. THIS IS THE CRUCIAL IMPORT LINE THAT WAS MISSING:
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // 2. Now this line will work because PHP knows where HasApiTokens comes from!
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

    // Our Custom Relationships
    public function profile()
    {
        return $this->hasOne(ResidentProfile::class);
    }

    public function certificateRequests()
    {
        return $this->hasMany(CertificateRequest::class);
    }

    public function incidentReports()
    {
        return $this->hasMany(IncidentReport::class);
    }
}