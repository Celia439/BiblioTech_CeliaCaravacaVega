<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. El libro especial de Celia
        $libroCelia = Libro::updateOrCreate(
            ['isbn' => '978-0-CELIA-2026'],
            [
                'titulo' => 'La historia de como Celia creó su primer proyecto',
                'autor' => 'Celia Caravaca',
                'editorial' => 'BiblioTech Ediciones',
                'anio_publicacion' => 2026,
                'idioma' => 'Español',
                'num_paginas' => 150,
                'cantidad' => 1,
                'descripcion' => 'Un relato épico sobre el aprendizaje de DAW y el dominio de Laravel.',
                'estado' => 'activo',
            ]
        );

        // 2. Los 10 libros aburridos
        $aburridos = [
            'Silla', 'Piedra', 'Mesa', 'Puerta', 'Ventana', 
            'Suelo', 'Pared', 'Techo', 'Cable', 'Enchufe'
        ];

        foreach ($aburridos as $index => $nombre) {
            Libro::updateOrCreate(
                ['isbn' => '978-Boring-' . ($index + 1)],
                [
                    'titulo' => $nombre,
                    'autor' => 'Autor Aburrido',
                    'editorial' => 'Editorial Genérica',
                    'anio_publicacion' => 2000 + $index,
                    'idioma' => 'Español',
                    'num_paginas' => 100,
                    'cantidad' => 5,
                    'descripcion' => 'Un libro increíblemente aburrido sobre ' . strtolower($nombre) . '.',
                    'estado' => 'activo',
                ]
            );
        }

        // 3. Generar 50 libros adicionales con Faker y asignar géneros
        $generos = \App\Models\Genero::all();

        if ($generos->isEmpty()) {
            // Si por alguna razón no hay géneros, creamos uno por defecto para que no falle
            $generos = collect([
                \App\Models\Genero::create(['nombre' => 'General', 'descripcion' => 'Género general'])
            ]);
        }

        for ($i = 1; $i <= 50; $i++) {
            $isbn = fake()->unique()->isbn13();
            $libro = Libro::updateOrCreate(
                ['isbn' => $isbn],
                [
                    'titulo' => fake()->sentence(3),
                    'autor' => fake()->name(),
                    'editorial' => fake()->company(),
                    'anio_publicacion' => fake()->year(),
                    'idioma' => fake()->randomElement(['Español', 'Inglés', 'Francés', 'Alemán']),
                    'num_paginas' => fake()->numberBetween(100, 1000),
                    'cantidad' => fake()->numberBetween(1, 10),
                    'descripcion' => fake()->paragraph(),
                    'estado' => 'activo',
                ]
            );

            // Asignar entre 1 y 3 géneros aleatorios
            $randomGeneros = $generos->random(fake()->numberBetween(1, min(3, $generos->count())))->pluck('id_genero');
            $libro->generos()->syncWithoutDetaching($randomGeneros);
        }
    }
}
