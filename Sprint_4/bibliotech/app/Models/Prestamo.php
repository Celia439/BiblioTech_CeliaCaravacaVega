<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';
    protected $primaryKey = 'id_prestamo';
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
        return $this->belongsTo(User::class, 'id_usuario_lector');
    }

    public function bibliotecario()
    {
        return $this->belongsTo(User::class, 'id_bibliotecario');
    }

    public function ejemplar()
    {
        return $this->belongsTo(Ejemplar::class, 'id_ejemplar');
    }

    public function multa()
    {
        return $this->hasOne(Multa::class, 'id_prestamo');
    }
}
