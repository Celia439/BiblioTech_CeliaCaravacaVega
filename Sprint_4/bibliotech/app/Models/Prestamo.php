<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario_lector',
        'id_ejemplar',
        'id_bibliotecario',
        'fecha_prestamo',
        'fecha_limite',
        'fecha_devolucion',
        'observacion',
        'estado',
    ];

    public function lector()
    {
        return $this->belongsTo(User::class, 'id_usuario_lector', 'id');
    }

    public function bibliotecario()
    {
        return $this->belongsTo(User::class, 'id_bibliotecario', 'id');
    }

    public function ejemplar()
    {
        return $this->belongsTo(Ejemplar::class, 'id_ejemplar', 'id');
    }

    public function multa()
    {
        return $this->hasOne(Multa::class, 'id_prestamo', 'id');
    }
}
