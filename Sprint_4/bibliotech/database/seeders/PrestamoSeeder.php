<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestamo;
use App\Models\User;
use App\Models\Ejemplar;
use Carbon\Carbon;

class PrestamoSeeder extends Seeder
{
    public function run(): void
    {
        $lectores = User::where('rol', 'lector')->pluck('id_usuario');
        $bibliotecarios = User::where('rol', 'bibliotecario')->pluck('id_usuario');
        $ejemplares = Ejemplar::pluck('id_ejemplar');

        if ($lectores->isEmpty() || $ejemplares->isEmpty() || $bibliotecarios->isEmpty()) {
            return;
        }

        for ($i = 0; $i < 15; $i++) {
            Prestamo::create([
                'id_usuario_lector' => $lectores->random(),
                'id_ejemplar' => $ejemplares->random(),
                'id_bibliotecario' => $bibliotecarios->random(),
                'fecha_prestamo' => Carbon::now()->subDays(rand(1, 30)),
                'fecha_limite' => Carbon::now()->addDays(15),
                'estado' => 'activo',
            ]);
        }
    }
}
