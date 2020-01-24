<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capataz extends Model
{
    //
    public $table = 'capataz';

    public $guarded = [];

    public function Sancion()
    {
        return $this->hasMany('App\Cosecha', 'id_capataz');
    }

    public function cosecha()
    {
        return $this->hasMany('App\Cosecha', 'id_capataz');
    }
}
