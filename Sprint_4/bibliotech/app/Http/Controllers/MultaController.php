<?php

namespace App\Http\Controllers;

use App\Models\Multa;
use Illuminate\Support\Facades\Auth;

class MultaController extends Controller
{
    // Vista para el bibliotecario (Ver todas las multas)
    public function index()
    {
        $multas = Multa::with(['prestamo.lector', 'prestamo.ejemplar.libro'])->get();
        return view('bibliotecario.multas', compact('multas'));
    }

    // Vista para el usuario (Ver sus propias multas)
    public function misMultas()
    {
        $usuario = Auth::user();
        
        $multas = Multa::whereHas('prestamo', function($query) use ($usuario) {
            $query->where('id_usuario_lector', $usuario->id_usuario);
        })->with(['prestamo.ejemplar.libro'])->get();

        return view('usuario.multas', compact('multas'));
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'pagada' => 'required|in:0,1',
        ]);

        $multa = Multa::findOrFail($id);
        $multa->update($request->all());

        return redirect()->back()->with('success', 'Multa actualizada correctamente');
    }

    public function destroy($id)
    {
        $multa = Multa::findOrFail($id);
        $multa->delete();

        return redirect()->back()->with('success', 'Multa eliminada correctamente');
    }
}
