<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeanceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('seances')->truncate();

        DB::table('seances')->insert([
            ['id_film' => 1, 'id_salle' => 1, 'id_personne_ouvreur' => 1, 'id_personne_technicien' => 2, 'id_personne_menage' => 3, 'debut_seance' => '2026-06-15 14:00:00', 'fin_seance' => '2026-06-15 16:00:00', 'places_disponibles' => 100],
            ['id_film' => 1, 'id_salle' => 2, 'id_personne_ouvreur' => 2, 'id_personne_technicien' => 3, 'id_personne_menage' => 4, 'debut_seance' => '2026-06-15 18:00:00', 'fin_seance' => '2026-06-15 20:00:00', 'places_disponibles' => 80],
            ['id_film' => 2, 'id_salle' => 3, 'id_personne_ouvreur' => 3, 'id_personne_technicien' => 4, 'id_personne_menage' => 5, 'debut_seance' => '2026-06-16 14:00:00', 'fin_seance' => '2026-06-16 16:00:00', 'places_disponibles' => 60],
            ['id_film' => 15, 'id_salle' => 3, 'id_personne_ouvreur' => 3, 'id_personne_technicien' => 4, 'id_personne_menage' => 5, 'debut_seance' => '2026-06-16 14:00:00', 'fin_seance' => '2026-06-16 16:00:00', 'places_disponibles' => 60],

            ]);
    }
}