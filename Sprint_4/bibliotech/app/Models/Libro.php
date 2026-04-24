<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $primaryKey = 'id_libro';
    public $timestamps = false;

    protected $fillable = [
        'isbn',
        'titulo',
        'autor',
        'editorial',
        'anio_publicacion',
        'idioma',
        'num_paginas',
        'cantidad',
        'descripcion',
        'estado',
    ];

    public function ejemplares()
    {
        return $this->hasMany(Ejemplar::class, 'id_libro');
    }

    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'libro_genero', 'id_libro', 'id_genero');
    }
}
