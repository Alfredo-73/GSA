<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cosecha extends Model
{
    public $table = 'cosecha';

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
