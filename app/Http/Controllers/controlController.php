<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Control;
use App\Cliente;
use App\Quincena;
use PDF;

class controlController extends Controller
{
    public function control(Request $req)
    {
        $controles = Control::all()->sortBy('quincena');
        

        // dd($productos);
        $vac = compact('controles');
        return view("control_quincenal", $vac);
    }
  
    public function agregar(Request $req){
        $controles = Control::all();
        $clientes = Cliente::all();
        $quincenas = Quincena::all();

        
        $vac = compact('controles', 'clientes', 'quincenas');
        
       return view('nuevo_control', $vac);
   }

    public function agregar_control(Request $req)
    {


 
        $reglas = [
            'quincena_id' => 'numeric|max:30',
            'id_cliente' => 'numeric|max:10',

            'num_factura' => 'numeric|min:0000000001|max:99999999999',
            'importe' => 'numeric|min:00000001|max:99999999',
            'retencion' => 'numeric|min:00000001|max:99999999',
            'monto_cobrado' => 'numeric|min:00000001|max:99999999',
            'gasto_bancario' => 'numeric|min:00000001|max:99999999',
            'pago_personal' => 'numeric|min:00000001|max:99999999',
            'pago_transporte' => 'numeric|min:00000001|max:99999999',
            'toneladas' => 'numeric|min:00000001|max:99999999',
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
        
        $control_nuevo->quincena_id = $req['quincena_id'];
        $control_nuevo->nombre_quincena = $req['quincena_id'];
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

      
    


        return redirect('control_quincenal')->with('success', 'El control quincenal ha sido grabado con exito');
    }

    public function edit($id)
    {

        $control = Control::Find($id);
        $clientes = Cliente::all();
        $quincenas= Quincena::all();

        $vac = compact('control', 'clientes', 'quincenas');

        return view('modif_control', $vac);
        
    }
    public function update(Request $req,$id)
    {

        $control = Control::Find($id);
        $reglas = [
            'quincena_id' => 'numeric|min:1|max:30',
            'id_cliente' => 'numeric|max:10',

            'num_factura' => 'numeric|min:0000000001|max:99999999999',
            'importe' => 'numeric|min:00000001|max:99999999',
            'retencion' => 'numeric|min:00000001|max:99999999',
            'monto_cobrado' => 'numeric|min:00000001|max:99999999',
            'gasto_bancario' => 'numeric|min:00000001|max:99999999',
            'pago_personal' => 'numeric|min:00000001|max:99999999',
            'pago_transporte' => 'numeric|min:00000001|max:99999999',
            'toneladas' => 'numeric|min:00000001|max:99999999',
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
        $control->quincena_id = $req['quincena_id'];
        $control->nombre_quincena = $req['quincena_id'];
        $control->id_cliente = $req['id_cliente'];
        $control->num_factura = $req['num_factura'];
        $control->importe = $req['importe'];
        $control->retencion = $req['retencion'];
        $control->monto_cobrado = $req['monto_cobrado'];
        $control->gasto_bancario = $req['gasto_bancario'];
        $control->libre_dispon = $req['importe']-($req['retencion']+ $req['gasto_bancario']);
        $control->pago_personal = $req['pago_personal'];
        $control->pago_transporte = $req['pago_transporte'];
        $control->toneladas = $req['toneladas'];
        $control->observacion = $req['observacion'];
        //grabar
        $control->save();

        return redirect('control_quincenal')->with('success', 'El control quincenal ha sido modificado con exito');



               
    }


    public function borrar(Request $form)
    //public function borrar($id)
    {
        $id = $form['id'];

        $control = Control::find($id);
        $control->delete();

        
        return redirect('/control_quincenal');
    }

    //pdf
    public function index()
    {
        $controles = Control::all();

        return view('list', compact('controles'));
    }

    public function downloadPDF($id)
    {
        $control = Control::find($id);
        $pdf = PDF::loadView('pdf', compact('control'));

        return $pdf->download('control.pdf');

        //para verlo
    }

    //para ver y apaisar la hoja
   /* public function download()
    {
        $data = [
            'titulo' => 'Styde.net'
        ];

        return PDF::loadView('vista-pdf', $data)
            ->setPaper('a4', 'landscape')
            ->stream('archivo.pdf');
    }*/
    
}
