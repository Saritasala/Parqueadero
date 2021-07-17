<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parqueadero extends Model
{
    protected $fillable = [
        'puestos',
        'nombre',
        'pisos',
    ];
    protected $table = 'parqueadero';

   

}
