<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('bibliotecario.usuarios', compact('usuarios'));
    }

    public function cuenta()
    {
        return view('usuario.cuenta');
    }

    public function favoritos()
    {
        return view('usuario.favoritos');
    }
}
