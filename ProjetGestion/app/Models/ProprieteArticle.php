<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProprieteArticle extends Model
{
    use HasFactory;

    public function typeArticle()
    {
        return $this->belongsTo(TypeArticle::class, "type_article_id", "id");
    }

    public function articles()//Relation ManyToMany
    {
        return $this->belongsToMany(ProprieteArticle::class, "article_propriete", "propriete_article_id", "article_id");
    }
}
