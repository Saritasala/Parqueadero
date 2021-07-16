<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tarifas extends Model
{
    protected $fillable = [
    'title',
    'description',
    'precio',
    'tipo_vehiculo',
    ];
    
    protected $table = 'comercios';
}
