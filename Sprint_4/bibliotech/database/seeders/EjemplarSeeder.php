<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ejemplar;
use App\Models\Libro;

class EjemplarSeeder extends Seeder
{
    public function run(): void
    {
        $libros = Libro::all();

        if ($libros->isEmpty()) {
            return;
        }

        foreach ($libros as $libro) {
            // Crear 2 ejemplares por cada libro
            for ($i = 1; $i <= 2; $i++) {
                Ejemplar::create([
                    'id_libro' => $libro->id_libro,
                    'codigo_barra' => 'CB-' . $libro->id_libro . '-' . $i,
                    'estado' => 'disponible',
                    'fecha_alta' => now(),
                ]);
            }
        }
    }
}
