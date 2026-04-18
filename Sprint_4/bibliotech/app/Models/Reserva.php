<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_ejemplar',
        'fecha_reserva',
        'observacion',
        'estado',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function ejemplar()
    {
        return $this->belongsTo(Ejemplar::class, 'id_ejemplar', 'id');
    }
}
