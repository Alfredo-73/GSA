<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    public $table = 'controles';

    public $guarded = [];
    //
//queryscope
    public function scopeCliente($query, $cliente)
    {
        if($cliente && ($cliente != "Cliente"))
        {
            return $query->where('id_cliente', 'LIKE', "%$cliente%");
        }
    }
    public function scopeQuincena($query, $quincena)
    {
        if ($quincena && ($quincena != "Quincena")) {
            return $query->where('quincena_id', 'LIKE', "%$quincena%");
        }
    }
    public function scopenombreCliente($query, $name)
    {
        if (trim ($name) != "") {
            return $query->where(\DB::raw('nombre', 'like', "%$name%"));
        }
    }

    //scope global
    public function scopeBuscarpor($query, $tipo, $buscar)
    {
        if (( $tipo) && ($buscar)) {
            return $query->where($tipo, 'LIKE', "%$buscar%");
        }
    }
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }
     public function quincena()
    {
        return $this->belongsTo('App\Quincena', 'quincena_id');
    }
}
