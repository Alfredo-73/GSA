<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    //public $table = 'empleados';

    public $guarded = [];

    public function Sancion()
    {
        return $this->hasMany('App\Sancion', 'id_sanciones');
    }
    public function capataz()
    {
        return $this->belongsTo('App\Capatz', 'id_capataz');
    }
}
