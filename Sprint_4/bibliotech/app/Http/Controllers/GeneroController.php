<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todos los géneros para la navegación
        $generos = Genero::all();

        // Determinar el género seleccionado (por defecto el primero si no hay ID)
        $id_genero = $request->query('id_genero');

        if ($id_genero) {
            $generoActivo = Genero::find($id_genero);
        } else {
            $generoActivo = $generos->first();
        }

        // Obtener los libros vinculados a ese género a través de la tabla intermedia
        $libros = $generoActivo ? $generoActivo->libros : collect();

        return view('generos.index', compact('generos', 'generoActivo', 'libros'));
    }

    public function adminIndex()
    {
        $generos = Genero::all();
        return view('bibliotecario.generos', compact('generos'));
    }

    public function show($id)
    {
        $genero = Genero::findOrFail($id);
        $libros = $genero->libros;
        return view('generos.show', compact('genero', 'libros'));
    }
    public function store(Request $request)

    {
        //Validar datos 
        $request->validate([
            'nombre' => 'required|string|max:50|unique:generos,nombre',
            'descripcion' => 'nullable|string|max:200',
        ]);

        //Crear el registro en la base de datos
        Genero::create($request->all());

        //Redirigir al usuario a la página del género creada
        return redirect()->back()->with('success', 'Género agregado correctamente');
    }
    public function update(Request $request, $id)
    {
        //validamos los datos que nos pasan 
        $request->validate([
            'nombre' => 'required|string|max:50|unique:generos,nombre,' . $id . ',id_genero',
            'descripcion' => 'nullable|string|max:200',
        ]);

        //Buscamos el genero y lo acutalizamos 
        $genero = Genero::findOrFail($id);
        $genero->update($request->all());

        //Redirigimos al usuario a la página del género actualizada
        return redirect()->back()->with('success', 'Género actualizado correctamente');
    }
    public function destroy(Request $request, $id)
    {
        // Buscamos el género
        $genero = Genero::findOrFail($id);
        //Eliminamos el género
        $genero->delete();
        //Redirigimos al usuario a la página del género eliminada
        return redirect()->back()->with('success', 'Género eliminado correctamente');
    }
}
