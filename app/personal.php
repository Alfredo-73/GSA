<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal extends Model
{
    //
    public $table = 'personal';

    public $guarded = [];


    public function capataz()
    {
        return $this->belongsTo('App\Capataz', 'id_capataz');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'id_empleado');
    }
}
