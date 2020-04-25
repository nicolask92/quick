<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Session;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function rol()
    {
        return $this->belongsToMany(Rol::class,'users_roles','user_id','role_id');
    }

    public function setSession ($roles) {
            if(count($roles) > 0){
                Session::put ( [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['name'],
                    'nombre' => $this->name
                ]  );
            }
    }

    public function isAdministrator() {
        return $this->rol()->where('name', 'Administrador')->exists();
     }
}
