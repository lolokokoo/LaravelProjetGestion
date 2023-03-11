<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Client;
use App\Models\DureeLocation;
use App\Models\StatutLocation;
use App\Models\User;
use DateInterval;
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

        $dateDebut = $this->faker->dateTimeBetween('-2 month','-1 month');
        $duree_location_id = array_rand($durees_location->toArray()) + 1;
        $dateFin = clone $dateDebut;

        switch ($duree_location_id) {
            case 1:
                $dateFin->add(new DateInterval('P7D')); // ajoute 7 jours
                break;
            case 2:
                $dateFin->add(new DateInterval('P1D')); // ajoute 1 jour
                break;
            case 3:
                $dateFin->add(new DateInterval('PT12H')); // ajoute 12 heures
                break;
            default:
                $dateFin = $this->faker->dateTimeBetween('-1 month');
                break;
        }

        return [
            "dateDebut" => $dateDebut,
            "dateFin" => $dateFin,
            "article_id" => array_rand($articles->toArray()) + 1,
            "duree_location_id" => $duree_location_id,
            "client_id" => array_rand($clients->toArray()) + 1,
            "user_id" => array_rand($users->toArray()) + 1,
            "statut_location_id" => array_rand($status->toArray()) + 1,
        ];
    }

}
