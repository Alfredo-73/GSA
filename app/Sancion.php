<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    public $table = 'sanciones';

    public $guarded = [];

    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'id_empresa');
    }
    public function capataz()
    {
        return $this->belongsTo('App\Capataz', 'id_capataz');
    }
    /*public function empleados()
    {
        return $this->belongsToMany('App\Empleado',  'empleados_sanciones', 'id_sanciones', 'id_empleado');
    }*/

    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'id_sanciones');
    }
  /* public function scopeCapataz($query, $capataz)
    {
        if ($capataz && ($capataz != "Capataz")) {
            return $query->where('id_capataz', 'LIKE', "%$capataz%");
        }
    } */
    public function scopeSanciones($query, $sanciones)
    {
        if ($sanciones && ($sanciones != "sanciones")) {
            return $query->where('id', 'LIKE', "%$sanciones%");
        }
    }
    public function scopeNombres($query, $nombres) {
    	if (trim ($nombres) != "") {
    		return $query->where('nombre','like',"%$nombres%");
    	}
    }

    public function scopeApellidos($query, $apellidos) {
    	if (trim($apellidos) != "") {
    		return $query->where('apellido','like',"%$apellidos%");
    	}
    }
    //
}
