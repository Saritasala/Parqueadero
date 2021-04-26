<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parametros_value extends Model
{

    protected $fillable = [
        'name'
    ];

    protected $table = 'parametros_values';
}
