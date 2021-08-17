<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'last_name',
        'email',
        'cedula',
        'phone',
        'password',
        'role_id',
        'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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

    public function getRole()
    {
        return $this->belongsTo(roles::class, 'role_id');
    }

    public function scopeFlName($query, $name)
    {
       if (trim($name) != null) {
          return $query->where("name", 'LIKE', '%'.$name.'%');
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
