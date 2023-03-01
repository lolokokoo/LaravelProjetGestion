<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\DureeLocation;
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
            ArticleTableSeeder::class, //Must be created after Type Article
            RoleSeeder::class, //must be created before User
            UserSeeder::class,
            DureeLocationTableSeeder::class,
            StatutLocationSeeder::class,
            ClientSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
