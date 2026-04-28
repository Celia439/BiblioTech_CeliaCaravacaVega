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
        $user = auth()->user();
        
        $numPrestamos = \App\Models\Prestamo::where('id_usuario_lector', $user->id_usuario)->count();
        $numReservas = \App\Models\Reserva::where('id_usuario', $user->id_usuario)->count();
        $numMultas = \App\Models\Multa::whereHas('prestamo', function($q) use ($user) {
            $q->where('id_usuario_lector', $user->id_usuario);
        })->where('pagada', false)->count();

        return view('usuario.cuenta', compact('numPrestamos', 'numReservas', 'numMultas'));
    }

    public function favoritos()
    {
        $favoritos = collect([]); // Por ahora vacío
        return view('usuario.favoritos', compact('favoritos'));
    }
}
