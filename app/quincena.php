<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quincena extends Model
{
     public $table = 'quincena';

    public $guarded = [];
    //
    public function control()
    {
        return $this->hasMany('App\Control', 'quincena_id');
    }
}
