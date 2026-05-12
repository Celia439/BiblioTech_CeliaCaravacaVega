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
        $lectores = \App\Models\User::where('rol', 'lector')->get();
        $ejemplares = \App\Models\Ejemplar::where('estado', 'disponible')->with('libro')->get();
        
        return view('bibliotecario.prestamos', compact('prestamos', 'lectores', 'ejemplares'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'id_usuario_lector' => 'required|exists:users,id_usuario',
            'id_ejemplar' => 'required|exists:ejemplares,id_ejemplar',
            'fecha_prestamo' => 'required|date',
            'fecha_limite' => 'required|date|after_or_equal:fecha_prestamo',
            'estado' => 'required|in:activo,devuelto,atrasado',
        ]);

        $data = $request->all();
        $data['id_bibliotecario'] = Auth::id();

        $prestamo = Prestamo::create($data);

        // Si se crea un préstamo activo, marcamos el ejemplar como prestado
        if ($prestamo->estado == 'activo') {
            $ejemplar = \App\Models\Ejemplar::find($request->id_ejemplar);
            $ejemplar->update(['estado' => 'prestado']);
        }

        return redirect()->back()->with('success', 'Préstamo registrado correctamente');
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'id_usuario_lector' => 'required|exists:users,id_usuario',
            'id_ejemplar' => 'required|exists:ejemplares,id_ejemplar',
            'fecha_prestamo' => 'required|date',
            'fecha_limite' => 'required|date|after_or_equal:fecha_prestamo',
            'estado' => 'required|in:activo,devuelto,atrasado',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $oldEstado = $prestamo->estado;
        $prestamo->update($request->all());

        // Manejar cambio de estado del ejemplar
        if ($oldEstado != 'devuelto' && $request->estado == 'devuelto') {
            $prestamo->ejemplar->update(['estado' => 'disponible']);
        } elseif ($oldEstado == 'devuelto' && $request->estado == 'activo') {
            $prestamo->ejemplar->update(['estado' => 'prestado']);
        }

        return redirect()->back()->with('success', 'Préstamo actualizado correctamente');
    }

    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        
        // Si el préstamo estaba activo, liberamos el ejemplar
        if ($prestamo->estado == 'activo') {
            $prestamo->ejemplar->update(['estado' => 'disponible']);
        }

        $prestamo->delete();

        return redirect()->back()->with('success', 'Préstamo eliminado correctamente');
    }
}
