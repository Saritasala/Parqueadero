<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'reference',
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

    public function getPayment_state(){
        return $this->belongsTo(parametros::class, 'payment_state');
    }

    public function getPayment(){
        return $this->belongsTo(parametros_value::class, 'payment_type_vp');
    }

}
