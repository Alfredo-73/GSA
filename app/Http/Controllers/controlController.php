<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Control;

class controlController extends Controller
{
    public function control(Request $req)
    {
        $controles = Control::all();

        // dd($productos);
        $vac = compact('controles');
        return view("control_quincenal", $vac);
    }
  
  /*  public function control(){
       return view('control_quincenal');
   }*/ 

    public function agregar_control(Request $req)
    {


 
        $reglas = [
            'quincena' => 'numeric|min:0|max:11',
            'id_cliente' => 'numeric|max:10',

            'num_factura' => 'numeric|max:11',
            'importe' => 'numeric|max:10',
            'retencion' => 'numeric|max:10',
            'monto_cobrado' => 'numeric|max:10',
            'gasto_bancario' => 'numeric|max:10',
            'pago_personal' => 'numeric|max:10',
            'pago_transporte' => 'numeric|max:10',
            'toneladas' => 'numeric|max:10',
            'observacion' => 'string|min:0|max:255',
            
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'date' => 'El campo :attribute debe ser fecha',
            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
            'unique' => 'El campo :attribute se encuentra repetido'
        ];

        $this->validate($req, $reglas, $mensajes);

        $control_nuevo = new Control();
        
        $control_nuevo->quincena = $req['quincena'];
        $control_nuevo->id_cliente = $req['id_cliente'];
        $control_nuevo->num_factura = $req['num_factura'];
        $control_nuevo->importe = $req['importe'];
        $control_nuevo->retencion = $req['retencion'];
        $control_nuevo->monto_cobrado = $req['monto_cobrado'];
        $control_nuevo->gasto_bancario = $req['gasto_bancario'];
        $control_nuevo->libre_dispon = $req['importe']-($req['retencion']+ $req['gasto_bancario']);
        $control_nuevo->pago_personal = $req['pago_personal'];
        $control_nuevo->pago_transporte = $req['pago_transporte'];
        $control_nuevo->toneladas = $req['toneladas'];
        $control_nuevo->observacion = $req['observacion'];
        //grabar
        $control_nuevo->save();

      
    


        return redirect('agregar_control');
    }
}
