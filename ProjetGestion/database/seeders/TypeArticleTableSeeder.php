<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("type_articles")->insert([
            ["nom" => "Voiture"],
            ["nom" => "Immobilier"],
            ["nom" => "Appareils Electroniques"],
            ["nom" => "Salle"],
        ]);
    }
}
