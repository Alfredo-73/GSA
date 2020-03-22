<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Cosecha;
use App\Control;
use Laracasts\Flash\Flash;


use Illuminate\Http\Request;

class clienteController extends Controller
{
     public function listado(Request $req)
    {
        $clientes = Cliente::all()->sortBy('nombre');
        

        // dd($productos);
        $vac = compact('clientes');
        return view("abm_cliente", $vac);
    }

    public function buscarpor(Request $request)
    {
        $name = $request->get('buscarpor');
        //dd($cliente);
       //$variablesurl = $request->all();

        $clientes = Cliente::where('nombre', 'like', "%$name%")
                        ->paginate(5);
 

        return view('abm_cliente', compact('clientes'));
    }
    public function agregar(Request $req){
       
        $clientes = Cliente::all();

        
        $vac = compact( 'clientes');
        
       return view('nuevo_cliente', $vac);
   }

    public function agregar_cliente(Request $req)
    {


 
        $reglas = [
            'nombre' => 'string|min:0|max:255|unique:clientes',
            'cuit' => 'integer',

            
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'unique' => 'El cliente ya existe',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
        ];

        $this->validate($req, $reglas, $mensajes);

        $cliente_nuevo = new Cliente();
        
        $cliente_nuevo->nombre = $req['nombre'];
        $cliente_nuevo->cuit = $req['cuit'];
        
        //grabar
        $cliente_nuevo->save();

      
        Flash::success('Se ha dado de alta el cliente ' . $cliente_nuevo->nombre . ' de forma exitosa !' );


        return redirect('abm_cliente');
    }

    public function edit($id)
    {

        $cliente = Cliente::Find($id);
    
        $vac = compact('cliente');

        return view('modif_cliente', $vac);
        
    }
    public function update(Request $req, $id)
    {

        $cliente = Cliente::Find($id);
        $reglas = [
            'nombre' => 'string|min:0|max:255|unique:clientes',
            'cuit' => 'integer',
            
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'unique' => 'El cliente ya existe',
            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
        ];

       // $this->validate($req, $reglas, $mensajes);
        if($cliente->nombre != $req['nombre'] || $cliente->cuit != $req['cuit'])
        {
            $this->validate($req, $reglas, $mensajes);

            $cliente->nombre = $req['nombre'];
            $cliente->cuit = $req['cuit'];
            $cliente->save();
            Flash::success('Se ha modificado el cliente ' . $cliente->nombre . ' de forma exitosa !');
            return redirect('abm_cliente');
            

        }  else
        {
            return redirect('abm_cliente');          
        }

        //return redirect('abm_cliente');   
        
        //grabar
    }

    public function borrar($id)
    {
        $cliente = Cliente::where('id', $id)->with('sancion')->first();
        $cliente1 = Cliente::where('id', $id)->with('cosecha')->first();
        $cliente2 = Cliente::where('id', $id)->with('control')->first();
        if ($cliente || $cliente1 || $cliente2) {
            if ($cliente1->cosecha->isNotEmpty() || $cliente2->control->isNotEmpty() || $cliente->sancion->isNotEmpty()) {
                Flash('No se puede borrar el cliente ' . $cliente->nombre . ' ya que tiene datos asociados')->error();
                return back();
            }
            $cliente->delete();
            Flash::success('Se ha borrado el cliente ' . $cliente->nombre . '  de forma exitosa!!!');
        } else {
            return back()->withErrors('El cliente no existe');
        }
        return redirect('abm_cliente');
    }
   
}
