<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\Seance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Seance>
 */
class SeanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_film' => Film::all()->random()->id_film,
            'id_salle' => Salle::all()->random()->id_salle,
            'debut_seance' => fake()->dateTimeBetween('now', '+1 month'),
            'fin_seance' => fake()->dateTimeBetween('+1 month', '+2 months'),
            'places_disponibles' => fake()->numberBetween(20, 100),
        ];
    }
}