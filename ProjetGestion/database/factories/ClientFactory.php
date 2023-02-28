<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ville = $this->faker->city;
        $pays = $this->faker->country;

        return [
            "nom" => $this->faker->lastName,
            "prenom" => $this->faker->firstName,
            'sexe' => array_rand(['F', "H"], 1),
            "dateNaissance" => $this->faker->dateTimeBetween("1990-01-01", "2005-12-31"),
            'lieuNaissance' => $pays . ' ' . $ville,
            'nationalite' => $pays,
            'pays' => $pays,
            'ville' => $ville,
            'adresse' => $this->faker->address,
            'telephone1' => $this->faker->phoneNumber,
            'telephone2' => $this->faker->phoneNumber,
            'pieceIdentite' => array_rand(["CNI", "PASSPORT", "PERMIS DE CONDUIRE"], 1),
            'noPieceIdentite' => $this->faker->creditCardNumber,
        ];
    }
}
