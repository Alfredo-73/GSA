<?php

namespace App;
Use DB;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    public $table = 'facturas';

    public $guarded = [];

    public function control()
    {
        return $this->belongsTo('App\Control', 'id');
    }
}

