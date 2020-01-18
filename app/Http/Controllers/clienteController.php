<?php

namespace App\Http\Controllers;
use App\Cliente;
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
  
    public function agregar(Request $req){
       
        $clientes = Cliente::all();

        
        $vac = compact( 'clientes');
        
       return view('nuevo_cliente', $vac);
   }

    public function agregar_cliente(Request $req)
    {


 
        $reglas = [
            'nombre' => 'string|min:0|max:255|unique:cliente',
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
            'nombre' => 'string|min:0|max:255|unique:cliente',
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


    public function borrar(Request $form)
    //public function borrar($id)
    {
        $id = $form['id'];

        $cliente = Cliente::find($id);
        $cliente->delete();

        
        return redirect('/abm_cliente');
    }
   
}
