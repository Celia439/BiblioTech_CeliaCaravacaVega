<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\User;
use App\Models\Reserva;
use App\Models\Prestamo;
use App\Models\Multa;
//use App\Models\Genero;  // Agregar los generos

class WebController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'libros' => Libro::count(),
            'usuarios' => User::count(),
            'reservas' => Reserva::count(),
            'prestamos' => Prestamo::count(),
            'multas' => Multa::count(),
        ];
        return view('bibliotecario.dashboard', compact('stats'));
    }

    public function inicio()
    {
        $libros = Libro::limit(6)->get();
        return view('web.inicio', compact('libros'));
    }

    public function devolucion()
    {
        return view('web.info-devolucion');
    }

    public function prestamos()
    {
        return view('web.info-prestamos');
    }

    public function empresa()
    {
        return view('bibliotecario.empresa');
    }

    public function contacto()
    {
        return view('web.contacto');
    }
}
