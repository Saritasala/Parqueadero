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
    protected $table = 'products';

    public function getComercio(){
      return $this->belongsTo(comercio::class, 'comercio_id');
   }

}
