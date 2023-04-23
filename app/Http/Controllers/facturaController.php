<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use App\Control;*/
use App\Factura;
/*use App\Quincena;*/
/*use App\Cliente;*/
use PDF;
use Laracasts\Flash\Flash;
use DB;


class facturaController extends Controller
{
    public function agregar(Request $req)
    {
        $facturas = Factura::all();
        /*$clientes = Cliente::all();
        $quincenas = Quincena::all();*/


        $vac = compact('facturas');

        return view('nuevo_control_factura', $vac);
    }

    public function agregar_control_factura(Request $req)
    {
        $reglas = [
            'quincena_id' => 'required',
            'id_cliente' => 'required',
            'num_factura' => 'numeric|min:000000000|max:99999999999',
            'importe' => 'numeric|min:0000000000.00|max:9999999999.99',
            'retencion' => 'numeric|min:0000000|max:9999999999.99',
            'monto_cobrado' => 'numeric|min:0000000|max:9999999999.99',
            'gasto_bancario' => 'numeric|min:0000000|max:9999999999.99',
            'pago_personal' => 'numeric|min:0000000|max:9999999999.99',
            'pago_transporte' => 'numeric|min:0000000|max:9999999999.99',
            'toneladas' => 'numeric|min:0000000|max:9999999999.99',
            'fecha' => 'date',
            /*'nueve_treintayuno' => 'numeric|min:0000000|max:9999999999.99',
            'bines' => 'numeric|min:0000000|max:9999999999.99',
            'promedio' => 'numeric|min:0000000|max:9999999999.99',
            'diferencia' => 'numeric|min:0000000|max:9999999999.99',*/

        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'date' => 'El campo :attribute debe ser fecha',
            /*'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
            'required' => 'El campo :attribute no fue seleccionado',
            'unique' => 'El campo :attribute se encuentra repetido'*/
        ];

        $this->validate($req, $reglas, $mensajes);

        $control_nuevo_factura = new Factura();

        $control_nuevo_factura->quincena_id = $req['quincena_id'];
        //  $control_nuevo->nombre_quincena = $req['quincena_id'];
        $control_nuevo_factura->id_cliente = $req['id_cliente'];
        $control_nuevo_factura->num_factura = $req['num_factura'];
        $control_nuevo_factura->importe = $req['importe'];
        $control_nuevo_factura->retencion = $req['retencion'];
        $control_nuevo_factura->monto_cobrado = $req['monto_cobrado'];
        $control_nuevo_factura->gasto_bancario = $req['gasto_bancario'];
        $control_nuevo_factura->libre_dispon = $req['importe'] - ($req['retencion'] + $req['gasto_bancario']);
        $control_nuevo_factura->pago_personal = $req['pago_personal'];
        $control_nuevo_factura->pago_transporte = $req['pago_transporte'];
        $control_nuevo_factura->toneladas = $req['toneladas'];
        $control_nuevo_factura->observacion = $req['observacion'];
        $control_nuevo_factura->fecha = $req['fecha'];
        /*$control_nuevo->nueve_treintayuno = $req['nueve_treintayuno'];
        $control_nuevo->bines = $req['bines'];
        $control_nuevo->promedio = $req['promedio'];
        $control_nuevo->diferencia = $req['diferencia'];*/
        //grabar

        //dd($control_nuevo);
        $control_nuevo_factura->save();

        Flash::success('Se ha dado de alta el control quincenal de forma exitosa !');


        /*return redirect('control_quincenal');*/
    }
}


