<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehiculos extends Model
{
    protected $fillable = [
        'user_id',
        'clientes_id',
        'parqueadero_id',
        'placa',
        'modelo',
        'color',
        'fecha_entrada',
        'fecha_salida',
    ];

    protected $table = 'vehiculos';

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCliente(){
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }

    public function getParqueo(){
        return $this->belongsTo(parqueadero::class, 'parqueadero_id'); 
    }

}
