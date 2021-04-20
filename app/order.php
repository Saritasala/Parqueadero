<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'reference',
        'producto_id',
        'date',
        'payment_type_vp',
        'payment_state',
        'total',
        'direccion',
        'order_state',
    ];

    protected $table = 'orders';

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
