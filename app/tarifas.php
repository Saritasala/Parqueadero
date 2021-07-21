<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tarifas extends Model
{
    protected $fillable = [
    'parqueadero_id',
    'title',
    'description',
    'precio',
    'tipo_vehiculo',
    'tiempo',
    ];
    
    protected $table = 'tarifas';

    public function getParqueadero(){
        return $this->belongsTo(parqueadero::class, 'parqueadero_id');
    }

}
