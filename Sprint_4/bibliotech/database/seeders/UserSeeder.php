<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Crear el usuario Administrador (Celia)
        User::create([
            'nombre' => 'Celia',
            'apellido' => 'Caravaca',
            'dni' => '12345678C',
            'email' => 'admin@bibliotech.es',
            'password' => Hash::make('password'),
            'telefono' => '600112233',
            'direccion' => 'Calle Principal 123',
            'rol' => 'admin',
            'estado' => 'activo',
        ]);

        // 2. Crear algunos usuarios Lectores de prueba
        User::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'dni' => '11223344P',
            'email' => 'lector1@gmail.com',
            'password' => Hash::make('password'),
            'rol' => 'lector',
            'estado' => 'activo',
        ]);

        User::create([
            'nombre' => 'María',
            'apellido' => 'García',
            'dni' => '55667788G',
            'email' => 'lector2@gmail.com',
            'password' => Hash::make('password'),
            'rol' => 'lector',
            'estado' => 'activo',
        ]);
    }
}
