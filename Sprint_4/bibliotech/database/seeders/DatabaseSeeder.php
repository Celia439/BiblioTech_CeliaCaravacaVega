<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EstanteriaSeeder::class,
            UserSeeder::class,

            GeneroSeeder::class,
            LibroSeeder::class,
            EjemplarSeeder::class,
            ReservaSeeder::class,

            PrestamoSeeder::class,
            MultaSeeder::class,
        ]);


    }
}

