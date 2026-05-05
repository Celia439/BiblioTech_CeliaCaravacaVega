<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Ejemplar;
use Carbon\Carbon;

class ReservaSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = User::where('rol', 'lector')->pluck('id_usuario');
        $ejemplares = Ejemplar::pluck('id_ejemplar');

        if ($usuarios->isEmpty() || $ejemplares->isEmpty()) {
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            Reserva::create([
                'id_usuario' => $usuarios->random(),
                'id_ejemplar' => $ejemplares->random(),
                'fecha_reserva' => Carbon::now()->subDays(rand(1, 10)),
                'estado' => 'activa',

                'observacion' => 'Reserva de prueba ' . ($i + 1),
            ]);
        }
    }
}
