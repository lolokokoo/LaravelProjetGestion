<?php

namespace Database\Seeders;

use App\Models\Article;
use Carbon\Carbon;
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
        $now = Carbon::now();

        DB::table('type_articles')->insert([
            [
                'nom' => 'Voiture',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nom' => 'Immobilier',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nom' => 'Appareils Electroniques',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'nom' => 'Salle',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
