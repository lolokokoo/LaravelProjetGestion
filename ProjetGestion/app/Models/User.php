<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function paiments()
    {
        return $this->hasMany(Paiment::class);
    }

    public function roles()//Relation ManyToMany
    {
        return $this->belongsToMany(User::class, "user_role", "user_id", "role_id");
    }

    public function permissions()//Relation ManyToMany
    {
        return $this->belongsToMany(User::class, "user_permission", "user_id", "permission_id");
    }

    public function hasRole($role) //Vérifie si l'user à le role en question
    {
        return $this->roles()->where('name', $role)->first() !== null;
    }

    public function hasAnyRole($roles)//Vérifie si l'user à au moins un des $roles
    {
        return $this->roles()->whereIn('name', $roles)->first() !== null;
    }

}
