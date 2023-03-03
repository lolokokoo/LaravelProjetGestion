<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProprieteTypeArticle extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function typeArticle()
    {
        return $this->belongsTo(TypeArticle::class, "type_article_id", "id");
    }
}
