<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    protected $table = 'ejemplares';
    public $timestamps = false;

    protected $fillable = [
        'id_libro',
        'codigo_barra',
        'estado',
        'id_estanteria',
        'fecha_alta',
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_libro', 'id');
    }

    public function estanteria()
    {
        return $this->belongsTo(Estanteria::class, 'id_estanteria', 'id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_ejemplar', 'id');
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'id_ejemplar', 'id');
    }
}
