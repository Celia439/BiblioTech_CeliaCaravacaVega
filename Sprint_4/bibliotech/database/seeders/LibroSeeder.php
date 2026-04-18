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
        Libro::create([
            'isbn' => '978-0-CELIA-2026',
            'titulo' => 'La historia de como Celia creó su primer proyecto',
            'autor' => 'Celia Caravaca',
            'editorial' => 'BiblioTech Ediciones',
            'anio_publicacion' => 2026,
            'idioma' => 'Español',
            'num_paginas' => 150,
            'cantidad' => 1,
            'descripcion' => 'Un relato épico sobre el aprendizaje de DAW y el dominio de Laravel.',
            'estado' => 'activo',
        ]);

        // 2. Los 10 libros aburridos
        $aburridos = [
            'Silla', 'Piedra', 'Mesa', 'Puerta', 'Ventana', 
            'Suelo', 'Pared', 'Techo', 'Cable', 'Enchufe'
        ];

        foreach ($aburridos as $index => $nombre) {
            Libro::create([
                'isbn' => '978-Boring-' . ($index + 1),
                'titulo' => $nombre,
                'autor' => 'Autor Aburrido',
                'editorial' => 'Editorial Genérica',
                'anio_publicacion' => 2000 + $index,
                'idioma' => 'Español',
                'num_paginas' => 100,
                'cantidad' => 5,
                'descripcion' => 'Un libro increíblemente aburrido sobre ' . strtolower($nombre) . '.',
                'estado' => 'activo',
            ]);
        }
    }
}
