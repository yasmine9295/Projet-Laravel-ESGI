<?php

namespace Database\Seeders;

use App\Models\Seance;
use Illuminate\Database\Seeder;


class SeanceSeeder extends Seeder

{
    public function run(): void
    {
        Seance::truncate();
        Seance::factory()
            ->count(5)
            ->create();
    }
}