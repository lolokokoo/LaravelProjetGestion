<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'prenom',
        'sexe',
        'pieceIdentite',
        'numeroPieceIdentite',
        'telephone1',
        'telephone2',
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

    public function paiments(): hasMany
    {
        return $this->hasMany(Paiment::class);
    }

    public function roles(): BelongsToMany//Relation ManyToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions(): BelongsToMany//Relation ManyToMany
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
    }

    public function hasRole($role):bool //Vérifie si l'user à le role en question
    {
        return in_array($role, userRoles());
    }

    public function getAllRolesNamesAttribute():string
    {
        return $this->roles->pluck('nom')->implode(' | ');
    }

}
