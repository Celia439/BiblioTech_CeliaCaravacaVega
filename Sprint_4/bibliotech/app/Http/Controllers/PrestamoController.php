<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller
{
    public function historial()
    {
        $usuario = Auth::user();
        if (!$usuario) return redirect('/login');

        // Obtener historial de préstamos del usuario
        $prestamos = Prestamo::where('id_usuario_lector', $usuario->id_usuario)
            ->with(['ejemplar.libro'])
            ->get();

        return view('usuario.prestamos', compact('prestamos'));
    }

    public function index()
    {
        $prestamos = Prestamo::with(['lector', 'ejemplar.libro'])->get();
        return view('bibliotecario.prestamos', compact('prestamos'));
    }
}
