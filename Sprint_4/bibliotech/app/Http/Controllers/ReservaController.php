<?php

namespace App\Http\Controllers;

class ReservaController extends Controller
{
    public function historial()
    {
        return view('usuario.reservas');
    }

    public function index()
    {
        return view('bibliotecario.reservas');
    }
}
