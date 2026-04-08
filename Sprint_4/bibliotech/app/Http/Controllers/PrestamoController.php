<?php

namespace App\Http\Controllers;

class PrestamoController extends Controller
{
    public function historial()
    {
        return view('usuario.prestamos');
    }

    public function index()
    {
        return view('bibliotecario.prestamos');
    }
}
