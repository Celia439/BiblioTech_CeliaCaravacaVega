<?php

namespace App\Http\Controllers;

class MultaController extends Controller
{
    // Vista para el bibliotecario (Ver todas las multas)
    public function index()
    {
        return view('bibliotecario.multas');
    }

    // Vista para el usuario (Ver sus propias multas)
    public function misMultas()
    {
        return view('usuario.multas');
    }
}
