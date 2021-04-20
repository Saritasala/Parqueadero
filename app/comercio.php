<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comercio extends Model
{
    protected $fillable = [
    'name',
    'description',
    'number',
    'email',
    'direccion',
    ];
    
    protected $table = 'comercios';
}
