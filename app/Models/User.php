<?php

namespace App\Models;

use App\UserRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'username', 'name', 'email', 'password', 'photo_profile', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected function role(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => UserRole::from($value),
            set: fn (UserRole $value) => $value->value,
        );
    }
}
