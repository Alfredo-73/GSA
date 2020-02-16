<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    public $table = 'empleados';

    public $guarded = [];

     /*public function sanciones()
     {
         return $this->belongsToMany('App\Sancion', 'empleados_sanciones', 'id_empleado', 'id_sanciones');
     }
*/

    public function sancion()
    {
        return $this->hasMany('App\Sancion', 'id_empleado');
    }
    public function capataz()
    {
        return $this->belongsTo('App\Capataz', 'id_capataz');
    }
    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'id_empresa');
    }
    public function scopeCapataz($query, $capataz)
    {
        if ($capataz && ($capataz != "Capataz")) {
            return $query->where('id_capataz', 'LIKE', "%$capataz%");
        }
    }
    public function scopeSanciones($query, $sanciones)
    {
        if ($sanciones && ($sanciones != "sanciones")) {
            return $query->where('id_sanciones', 'LIKE', "%$sanciones%");
        }
    }
    public function scopeNombres($query, $nombres)
    {
        if (trim($nombres) != "") {
            return $query->where('nombre', 'like', "%$nombres%");
        }
    }



    public function scopeApellidos($query, $apellidos)
    {
        if (trim($apellidos) != "") {
            return $query->where('apellido', 'like', "%$apellidos%");
        }
    }

    public function empresa()
    {
        return $this->hasMany('App\Empresa', 'id_empresa');
    }
}
