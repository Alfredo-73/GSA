<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\If_;

class Control extends Model
{
    public $table = 'controles';
    //protected $fillable = ['id_cliente','id_empresa','num_factura','monto_cobrado'];
    public $guarded = [];
    
//---------------MODIFICO FOMATO DE LA FECHA A DD-MM-YYYY------------------------------------------------
    public function getFechaAttribute($value)
    {

        return date('d-m-Y', strtotime($value));
    } 
//--------------------------------------------------------------------------------------------------------
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
    public function scopenombreEmpresa($query, $name)
    {
        if (trim($name) != "") {
            return $query->where(\DB::raw('razon_social', 'like', "%razon_social%"));
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
        //return $this->hasMany('App\Cliente', 'id_cliente');
    }
     public function quincena()
    {
        return $this->belongsTo('App\Quincena', 'quincena_id');
    }
    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'id_empresa');
    }
    public function control()
    {
        return $this->hasMany('App\Control','id_factura');
    }
}

