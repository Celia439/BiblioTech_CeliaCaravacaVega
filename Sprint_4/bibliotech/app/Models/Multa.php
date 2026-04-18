<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    protected $table = 'multas';
    public $timestamps = false;

    protected $fillable = [
        'id_prestamo',
        'importe',
        'pagada',
        'fecha',
    ];

    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class, 'id_prestamo', 'id');
    }
}
