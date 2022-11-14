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

    public static function serveAll()
    {
        return self::join('roles', 'users.role_id', 'roles.id')
            ->select(
                'users.*',
                'roles.name as role_name',
            )->get();
    }

    public static function checkUserIsExisted($username, $password)
    {
        return self::where('username', $username)
            ->where('password', $password)
            ->where('is_active', 1);
    }
}
