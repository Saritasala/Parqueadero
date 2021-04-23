<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'stock',
        'total',
    
    ];
    protected $table = 'pedidos';

    public function getProduct()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
