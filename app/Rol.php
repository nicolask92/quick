<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name',];
    protected $guarded = ['id',];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function permisos(){
        return $this->belongsToMany(Permisos::class,'roles_permissions','role_id','permission_id');
    }
}
