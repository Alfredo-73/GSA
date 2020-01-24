<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    public $table = 'sanciones';

    public $guarded = [];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }
    public function capataz()
    {
        return $this->belongsTo('App\Capataz', 'id_capataz');
    }
    //
}
