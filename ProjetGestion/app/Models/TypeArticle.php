<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TypeArticle extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function proprietes(){
        return $this->hasMany(ProprieteArticle::class);
    }
}
