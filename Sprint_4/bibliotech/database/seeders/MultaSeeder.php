<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Multa;
use App\Models\Prestamo;
use Carbon\Carbon;

class MultaSeeder extends Seeder
{
    public function run(): void
    {
        $prestamos = Prestamo::pluck('id_prestamo');

        if ($prestamos->isEmpty()) {
            return;
        }

        // Mezclamos los préstamos y cogemos los primeros 5 para evitar duplicados (Unique constraint)
        $prestamosSeleccionados = $prestamos->shuffle()->take(5);

        foreach ($prestamosSeleccionados as $id_prestamo) {
            Multa::create([
                'id_prestamo' => $id_prestamo,
                'importe' => rand(5, 20),
                'pagada' => rand(0, 1),
                'fecha' => Carbon::now()->subDays(rand(1, 5)),
            ]);
        }

    }
}
