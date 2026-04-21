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
        $favoritos = collect([]); // Por ahora vacío
        return view('usuario.favoritos', compact('favoritos'));
    }
}
