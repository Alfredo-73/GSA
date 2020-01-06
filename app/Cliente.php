<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $table = 'cliente';

    public $guarded = [];

    public function control()
    {
        return $this->hasMany('App\Control', 'id_cliente');
    }
    //
}
