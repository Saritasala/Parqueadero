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

    public function scopeFlNombre($query, $nombre)
    {
       if (trim($nombre) != null) {
          return $query->where("name", 'LIKE', '%'.$nombre.'%');
       }
    }
    public function scopeFlState($query, $state)
    {
       if (trim($state) != null) {
          return $query->where("state", $state);
       }
    }
}
