<?php

namespace Database\Seeders;

use App\Models\Tarification;
use Illuminate\Database\Seeder;

class TarificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarification::factory(5)->create();

    }
}
