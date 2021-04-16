<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
    'name',
    'reference',
    'date',
    'payment_type_vp',
    'payment_state',
    'total',
    'direccion',
    'order_state',
    ];

    protected $table = 'order';
}
