<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    protected $table = 'tipoauto';

    protected $fillable = [
        'marca', 'modelo'
    ];
}
