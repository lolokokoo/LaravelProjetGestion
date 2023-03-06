<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\DureeLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tarification>
 */
class tarificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Durees = DureeLocation::all();
        $Articles = Article::all();

        return [
           "prix" => $this->faker->numberBetween(10,1000),
           'duree_location_id' => rand(1, count($Durees)),
           'article_id' => rand(1, count($Articles)),
        ];
    }
}
