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

    public function scopeFlName($query, $name)
    {
       if (trim($name) != null) {
          return $query->where("name", 'LIKE', '%'.$name.'%');
       }
    }
    public function scopeFlLast_name($query, $last_name)
    {
       if (trim($last_name) != null) {
        return $query->where("last_name", 'LIKE', '%'.$last_name.'%');
         
       }
    }
    public function scopeFlCedula($query, $cedula)
    {
       if (trim($cedula) != null) {
        return $query->where("cedula", 'LIKE', '%'.$cedula.'%');
         
       }
    }
    public function scopeFlState($query, $state)
    {
       if (trim($state) != null) {
          return $query->where("state", $state);
       }
    }
}
