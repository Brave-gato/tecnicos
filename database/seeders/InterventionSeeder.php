<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Intervention;

class InterventionSeeder extends Seeder
{
    public function run()
    {
        Intervention::factory(50)->create(); // Génère 50 interventions
    }
}
