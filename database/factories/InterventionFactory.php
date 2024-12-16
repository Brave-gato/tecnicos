<?php

namespace Database\Factories;

use App\Models\Intervention;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intervention>
 */
class InterventionFactory extends Factory
{
    protected $model = Intervention::class;

    public function definition()
    {
        return [
            'client_id' => Client::factory(), // Génère un client lié ou utilisez un client existant
            'user_id' => User::factory(), // Génère un utilisateur lié ou utilisez un technicien existant
            'status' => $this->faker->randomElement(['En attente', 'En cours', 'Terminé', 'Annulé']),
            'details' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
