<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
    ];

    protected $table = 'order_products';

    public function getOrder(){
        return $this->belongsTo(order::class, 'order_id');
    }

    public function getProducto(){
        return $this->belongsTo(product::class, 'producto_id');
    }
}
