<?php

namespace App\Http\Controllers;

use App\Models\Libro;

class LibroController extends Controller
{
    // Vista pública: Detalle de un libro
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        $librosRelacionados = Libro::where('id_libro', '!=', $id)->inRandomOrder()->limit(5)->get();
        return view('libro.show', compact('libro', 'librosRelacionados'));
    }


    // Vista de gestión: Listado de todos los libros (Bibliotecario)
    public function index()
    {
        $libros = Libro::all();
        return view('bibliotecario.libros', compact('libros'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|unique:libros,isbn',
            'cantidad' => 'required|integer|min:0',
            'estado' => 'required|in:activo,inactivo',
        ]);

        Libro::create($request->all());

        return redirect()->back()->with('success', 'Libro creado correctamente');
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|unique:libros,isbn,' . $id . ',id_libro',
            'cantidad' => 'required|integer|min:0',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update($request->all());

        return redirect()->back()->with('success', 'Libro actualizado correctamente');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->back()->with('success', 'Libro eliminado correctamente');
    }
}
