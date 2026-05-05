<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstanteriaSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('estanterias')->insert([
                'id_estanteria' => $i,
                'codigo' => 'EST-' . $i,
                'seccion' => 'Sección ' . chr(64 + $i),
                'pasillo' => 'Pasillo ' . $i,
                'descripcion' => 'Estantería de prueba ' . $i,
            ]);

        }
    }
}
