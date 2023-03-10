<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function statusLocation()
    {
        return $this->belongsTo(StatutLocation::class, "statut_location_id", "id");
    }
    public function dureesLocation()
    {
        return $this->belongsTo(DureeLocation::class, "duree_location_id", "id");
    }

    public function paiments()
    {
        return $this->hasMany(Paiment::class);
    }

    public function articles()//Relation ManyToMany
    {
        return $this->belongsToMany(Article::class, "article_location", "location_id", "article_id");
    }
}
