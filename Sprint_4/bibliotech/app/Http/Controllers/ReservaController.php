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
        $usuarios = \App\Models\User::all();
        $ejemplares = \App\Models\Ejemplar::with('libro')->get();
        return view('bibliotecario.reservas', compact('reservas', 'usuarios', 'ejemplares'));
    }
    
    public function create()
    {
        return view('usuario.hacer-reserva');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id_usuario',
            'id_ejemplar' => 'required|exists:ejemplares,id_ejemplar',
            'fecha_reserva' => 'required|date',
            'estado' => 'required|in:activa,cancelada,completada',
        ]);

        Reserva::create($request->all());

        return redirect()->back()->with('success', 'Reserva creada correctamente');
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id_usuario',
            'id_ejemplar' => 'required|exists:ejemplares,id_ejemplar',
            'fecha_reserva' => 'required|date',
            'estado' => 'required|in:activa,cancelada,completada',
        ]);

        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->all());

        return redirect()->back()->with('success', 'Reserva actualizada correctamente');
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return redirect()->back()->with('success', 'Reserva eliminada correctamente');
    }
}
