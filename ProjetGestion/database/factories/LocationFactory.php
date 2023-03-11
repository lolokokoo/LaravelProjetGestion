<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Client;
use App\Models\DureeLocation;
use App\Models\StatutLocation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $articles = Article::all();
        $durees_location = DureeLocation::all();
        $clients = Client::all();
        $users = User::all();
        $status = StatutLocation::all();
        return [
            "dateDebut" => $this->faker->dateTimeBetween('-2 month','-1 month'),
            "dateFin" => $this->faker->dateTimeBetween('-1 month'),
            "article_id" => array_rand($articles->toArray()) + 1,
            "duree_location_id" => array_rand($durees_location->toArray()) + 1,
            "client_id" => array_rand($clients->toArray()) + 1,
            "user_id" => array_rand($users->toArray()) + 1,
            "statut_location_id" => array_rand($status->toArray()) + 1,
        ];
    }
}
