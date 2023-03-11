<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Location;
use App\Models\ProprieteTypeArticle;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory(12)->create();
        $proprieteTypeArticle = ProprieteTypeArticle::all();

        $articles = Article::all();
        foreach ($articles as $article){
            $article->proprietes()->attach(rand(1, count($proprieteTypeArticle)));
            $article->proprietes()->attach(rand(1, count($proprieteTypeArticle)));
        }
    }
}
