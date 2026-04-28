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
        User::updateOrCreate(
            ['email' => 'admin@bibliotech.es'],
            [
                'nombre' => 'Celia',
                'apellido' => 'Caravaca',
                'dni' => '12345678C',
                'password' => Hash::make('password'),
                'telefono' => '600112233',
                'direccion' => 'Calle Principal 123',
                'rol' => 'bibliotecario',
                'estado' => 'activo',
            ]
        );

        // 2. Crear algunos usuarios Lectores de prueba
        User::updateOrCreate(
            ['email' => 'lector1@gmail.com'],
            [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'dni' => '11223344P',
                'password' => Hash::make('password'),
                'rol' => 'lector',
                'estado' => 'activo',
            ]
        );

        User::updateOrCreate(
            ['email' => 'lector2@gmail.com'],
            [
                'nombre' => 'María',
                'apellido' => 'García',
                'dni' => '55667788G',
                'password' => Hash::make('password'),
                'rol' => 'lector',
                'estado' => 'activo',
            ]
        );
    }
}
