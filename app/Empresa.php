<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $table = 'empresas';

    public $guarded = [];

    public function Empleado()
    {
        return $this->hasMany('App\Empleado', 'id_empresa');
    }
    public function Sancion()
    {
        return $this->hasMany('App\Sancion', 'id_empresa');
    }
    public function Personal()
    {
        return $this->hasMany('App\Empresa', 'id_empresa')->ondelete('cascade');
    }


}
