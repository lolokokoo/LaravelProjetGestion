<?php

namespace Database\Seeders;

use App\Models\ProprieteTypeArticle;
use Illuminate\Database\Seeder;

class ProprieteTypeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProprieteTypeArticle::factory(10)->create();
    }
}
