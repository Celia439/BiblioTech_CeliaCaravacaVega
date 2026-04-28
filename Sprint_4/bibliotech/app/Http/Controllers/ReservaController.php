<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function historial()
    {
        $usuario = Auth::user();
        if (!$usuario) return redirect('/login');

        // Obtener reservas del usuario con el libro relacionado
        $reservas = Reserva::where('id_usuario', $usuario->id_usuario)
            ->with(['ejemplar.libro'])
            ->get();

        return view('usuario.reservas', compact('reservas'));
    }

    public function index()
    {
        $reservas = Reserva::with(['usuario', 'ejemplar.libro'])->get();
        return view('bibliotecario.reservas', compact('reservas'));
    }
    
    public function create()
    {
        return view('usuario.hacer-reserva');
    }
}
