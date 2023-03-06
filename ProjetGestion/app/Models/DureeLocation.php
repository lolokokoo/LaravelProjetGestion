<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DureeLocation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'libelle',
        'valeurEnHeure'
    ];
}
