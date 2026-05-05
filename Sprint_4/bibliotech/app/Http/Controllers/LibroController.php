<?php

namespace App\Http\Controllers;

use App\Models\Libro;

class LibroController extends Controller
{
    // Vista pública: Detalle de un libro
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libro.show', compact('libro'));
    }

    // Vista de gestión: Listado de todos los libros (Bibliotecario)
    public function index()
    {
        $libros = \App\Models\Libro::all();
        return view('bibliotecario.libros', compact('libros'));
    }
}
