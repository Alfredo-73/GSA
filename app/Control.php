<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    public $table = 'control';

    public $guarded = [];
    //

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }
     public function quincena()
    {
        return $this->belongsTo('App\Quincena', 'quincena_id');
    }
}
