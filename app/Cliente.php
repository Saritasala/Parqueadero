<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Cliente as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 
        'last_name',
        'email',
        'cedula',
        'phone',
        'password',
        'vehiculo_id',
        'state',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'clientes';

    public function getVehiculo(){
        return $this->belongsTo(vehiculos::class, 'vehiculo_id');
    }

}
