<?php

namespace App\Http\Controllers;

class LibroController extends Controller
{
    // Vista pública: Detalle de un libro
    public function show($id)
    {
        return view('libro.show', ['id' => $id]);
    }

    // Vista de gestión: Listado de todos los libros (Bibliotecario)
    public function index()
    {
        $libros = \App\Models\Libro::all();
        return view('bibliotecario.libros', compact('libros'));
    }
}
