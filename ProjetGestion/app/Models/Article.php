<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function typeArticle()
    {
        return $this->belongsTo(TypeArticle::class, "type_article_id", "id");
    }

    public function tarifications()
    {
        return $this->hasMany(Tarification::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, "article_location", "article_id", "article_id");
    }

    public function proprietes()//Relation ManyToMany
    {
        return $this->belongsToMany(Article::class, "article_propriete", "article_id", "propriete_article_id");
    }

}
