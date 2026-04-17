<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estanteria extends Model
{
    protected $table = 'estanterias';
    protected $primaryKey = 'id_estanteria';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'pasillo',
        'seccion',
        'descripcion',
    ];

    public function ejemplares()
    {
        return $this->hasMany(Ejemplar::class, 'id_estanteria', 'id_estanteria');
    }
}
