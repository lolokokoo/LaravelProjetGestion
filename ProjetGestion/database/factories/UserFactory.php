<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->lastName(),
            'prenom' => fake()->firstName(),
            'sexe' =>['H', 'F'][rand(0,1)],
            'email' => fake()->unique()->safeEmail(),
            'telephone1' => fake()->unique()->phoneNumber(),
            'telephone2' => fake()->unique()->phoneNumber(),
            'pieceIdentite' => ['CNI', 'PASSPORT', 'PERMIS DE CONDUIRE'][rand(0,2)],
            'numeroPieceIdentite' => $this->faker->unique()->creditCardNumber,
            'photo' => $this->faker->imageUrl,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
