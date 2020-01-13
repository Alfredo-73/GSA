<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quincena;

class quincenaController extends Controller
{
    
    public function listado(Request $req)
    {
        $quincenas = Quincena::all()->sortBy('nombre');
        

        // dd($productos);
        $vac = compact('quincenas');
        return view("abm_quincena", $vac);
    }
  
    public function agregar(Request $req){
       
        $quincenas = quincena::all();

        
        $vac = compact( 'quincenas');
        
       return view('nueva_quincena', $vac);
   }
   public function agregar_vs(Request $req){
       
        $quincenas = quincena::all();

        
        $vac = compact( 'quincenas');
        
       return view('nueva_quincenas', $vac);
   }

    public function agregar_quincena(Request $req)
    {


 
        $reglas = [
            'nombre' => 'string|min:0|max:255',
            

            
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
        ];

        $this->validate($req, $reglas, $mensajes);

        $quincena_nuevo = new Quincena();
        
        $quincena_nuevo->nombre = $req['nombre'];
      
        
        //grabar
        $quincena_nuevo->save();

      
    


        return redirect('abm_quincena');
    }
    public function agregar_quincenas(Request $req)
    {


 
        $reglas = [
            'nombre' => 'string|min:0|max:255|unique:quincena',
            

            
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
             'unique' => 'La quincena ya existe',

            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
        ];

        $this->validate($req, $reglas, $mensajes);

        $quincena_nuevo = new Quincena();
        
        $quincena_nuevo->nombre = $req['nombre'];
      
        
        //grabar
        $quincena_nuevo->save();

      
    


        return view('nueva_quincena');
    }


    public function edit($id)
    {

        $quincena = Quincena::Find($id);
    
        $vac = compact('quincena');

        return view('modif_quincena', $vac);
        
    }
    public function update(Request $req, $id)
    {

        $quincena = Quincena::Find($id);
        $reglas = [
            'nombre' => 'string|min:0|max:255|unique:quincena',
           
            
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'unique' => 'La quincena ya existe',

            'max' => 'El campo :attribute tiene un maximo de :max',
            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
        ];

        $this->validate($req, $reglas, $mensajes);
        $quincena->nombre = $req['nombre'];
       
        
        //grabar
        $quincena->save();

        return redirect('abm_quincena');



               
    }


    public function borrar(Request $form)
    //public function borrar($id)
    {
        $id = $form['id'];

        $quincena = Quincena::find($id);
        $quincena->delete();

        
        return redirect('/abm_quincena');
    }
   //
}
