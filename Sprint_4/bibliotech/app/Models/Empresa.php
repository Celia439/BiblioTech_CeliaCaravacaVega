<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'email',
        'logo_url',
    ];
}
