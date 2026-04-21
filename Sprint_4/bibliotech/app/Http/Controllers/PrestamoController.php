<?php

namespace App\Http\Controllers;

class PrestamoController extends Controller
{
    public function historial()
    {
        $prestamos = collect([]); // Por ahora vacío, aquí se conectaría con la BD
        return view('usuario.prestamos', compact('prestamos'));
    }

    public function index()
    {
        return view('bibliotecario.prestamos');
    }
}
