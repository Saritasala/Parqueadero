<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'precio',
        'stock',
        'img_product',
        'comercio_id',
        'state',
    ];
    protected $table = 'product';

}
