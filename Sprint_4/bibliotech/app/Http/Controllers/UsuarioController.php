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

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'dni' => 'required|string|max:20|unique:users,dni',
            'email' => 'required|email|unique:users,email',
            'rol' => 'required|in:lector,bibliotecario,admin',
            'estado' => 'required|in:activo,bloqueado',
        ]);

        $data = $request->all();
        $data['password'] = \Illuminate\Support\Facades\Hash::make($request->dni); // Password por defecto el DNI

        User::create($data);

        return redirect()->back()->with('success', 'Usuario creado correctamente');
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'dni' => 'required|string|max:20|unique:users,dni,' . $id . ',id_usuario',
            'email' => 'required|email|unique:users,email,' . $id . ',id_usuario',
            'rol' => 'required|in:lector,bibliotecario,admin',
            'estado' => 'required|in:activo,bloqueado',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->back()->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
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
