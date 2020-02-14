<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $table = 'empresa';

    public $guarded = [];

    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'id_empresa');
    }

    public function empleados()
    {
        return $this->belongsTo('App\Empleado', 'id_empresa');
    }

    public function personal()
    {
        return $this->belongsTo('App\Personal', 'id_empresa');
    }
}
