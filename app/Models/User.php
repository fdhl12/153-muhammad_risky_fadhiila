<?php

namespace App\Models;

use App\UserRole;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;

class User extends Authenticatable
{
    use Notifiable, HasFactory, HasApiTokens;

    protected $fillable = [
        'username', 
        'name',
        'email', 
        'password', 
        'photo_profile', 
        'role'
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * Method untuk memeriksa apakah pengguna adalah admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
    protected function authenticated(Request $request, $user)
{
    if ($user->isAdmin()) { // Jika user memiliki peran admin
        return redirect()->route('admin.dashboard');
    }

    return redirect()->intended($this->redirectTo);
}

}