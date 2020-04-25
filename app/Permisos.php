<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name'];
    protected $guarded = ['id'];

    public function rol()
    {
        return $this->belongsToMany(Rol::class,'roles_permissions','role_id','permission_id');
    }

}
