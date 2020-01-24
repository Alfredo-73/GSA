<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $table = 'cliente';

    public $guarded = [];

    public function Sancion()
    {
        return $this->hasMany('App\Control', 'id_cliente');
    }

    public function control()
    {
        return $this->hasMany('App\Control', 'id_cliente');
    }
    public function cosecha()
    {
        return $this->hasMany('App\Cosecha', 'id_cliente');
    }
    //
}
