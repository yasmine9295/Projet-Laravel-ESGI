<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\SeanceSeeder;
use Database\Seeders\SalleSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            SeanceSeeder::class,
        ]);

        $this->call([
            SalleSeeder::class,
        ]);
    }
}
