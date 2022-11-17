<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'role_id',
        'username',
        'password',
        'name',
        'admin',
        'corrector',
        'is_active',
        'hmi_access',
        'entrance_access',
        'image',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
