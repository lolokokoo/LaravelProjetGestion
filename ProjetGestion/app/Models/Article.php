<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'noSerie',
        'imageUrl',
        'estDisponible',
        'type_article_id'
    ];

    public function typeArticle()
    {
        return $this->belongsTo(TypeArticle::class, "type_article_id", "id");
    }

    public function tarifications()
    {
        return $this->hasMany(Tarification::class);
    }

    public function proprietes()//Relation ManyToMany
    {
        return $this->belongsToMany(Article::class, "article_propriete", "article_id", "propriete_article_id");
    }

}
