<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TypeArticleTableSeeder::class,
            ProprieteTypeArticleSeeder::class,
            ArticleTableSeeder::class, //Must be created after Type Article
            UserSeeder::class,
            StatutLocationSeeder::class,
            ClientSeeder::class,
            TarificationSeeder::class,
            LocationSeeder::class,
        ]);
    }
}
