<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),
            'noSerie' => $this->faker->swiftBicNumber(),
            'imageUrl' => ['abricotsSecs.jpg', 'amandes.jpg', 'bouleDeNeigeCoco.jpg', 'jusPamplemousse.jpg'][rand(0,3)],
            'type_article_id' => rand(1, 4),
            'estDisponible' => $this->faker->boolean,
        ];
    }
}
