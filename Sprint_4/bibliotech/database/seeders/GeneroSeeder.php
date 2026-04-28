<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generos = [
            ['nombre' => 'Novela', 'descripcion' => 'Obras narrativas de ficción en prosa.'],
            ['nombre' => 'Ciencia Ficción', 'descripcion' => 'Relatos basados en avances científicos o tecnológicos futuros.'],
            ['nombre' => 'Fantasía', 'descripcion' => 'Historias con elementos mágicos, mundos imaginarios o criaturas irreales.'],
            ['nombre' => 'Terror', 'descripcion' => 'Género que busca provocar miedo, horror o ansiedad en el lector.'],
            ['nombre' => 'Aventura', 'descripcion' => 'Acción y situaciones arriesgadas en entornos desconocidos.'],
            ['nombre' => 'Misterio', 'descripcion' => 'Tramas centradas en la resolución de un enigma o crimen.'],
            ['nombre' => 'Biografía', 'descripcion' => 'Relato de la vida de una persona real.'],
            ['nombre' => 'Historia', 'descripcion' => 'Libros sobre eventos o periodos históricos reales.'],
            ['nombre' => 'Poesía', 'descripcion' => 'Expresión artística de la belleza o el sentimiento por medio de la palabra.'],
            ['nombre' => 'Romance', 'descripcion' => 'Historias centradas en relaciones amorosas.'],
            ['nombre' => 'Autoayuda', 'descripcion' => 'Libros que ofrecen consejos para el crecimiento personal.'],
            ['nombre' => 'Cocina', 'descripcion' => 'Recetas y técnicas culinarias.'],
        ];

        foreach ($generos as $genero) {
            Genero::updateOrCreate(['nombre' => $genero['nombre']], $genero);
        }
    }
}
