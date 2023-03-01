<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    public $timestamps = false;

    public function users()//Relation ManyToMany
    {
        return $this->belongsToMany(User::class);
    }
}
