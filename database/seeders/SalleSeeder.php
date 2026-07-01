<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Salle;

class SalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Salle::create([
            'numero_salle' => 16,
            'nom_salle' => 'Salle Rouge',
            'etage_salle' => 0,
            'places' => 120,
        ]);

        Salle::create([
            'numero_salle' => 17,
            'nom_salle' => 'Salle Bleue',
            'etage_salle' => 0,
            'places' => 80,
        ]);

        Salle::create([
            'numero_salle' => 18,
            'nom_salle' => 'Salle Verte',
            'etage_salle' => 1,
            'places' => 150,
        ]);

        Salle::create([
            'numero_salle' => 19,
            'nom_salle' => 'Salle Premium',
            'etage_salle' => 1,
            'places' => 60,
        ]);

        Salle::create([
            'numero_salle' => 20,
            'nom_salle' => 'Salle IMAX',
            'etage_salle' => 2,
            'places' => 250,
        ]);
    }
}
