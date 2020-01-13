<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capataz;

class capatazController extends Controller
{
     public function listado(Request $req)
    {
        $capataz = Capataz::all()->sortBy('nombre');
        

        // dd($productos);
        $vac = compact('capataz');
        return view("abm_capataz", $vac);
    }
  
    public function agregar(Request $req){
       
        $capataz = Capataz::all();

        
        $vac = compact( 'capataz');
        
       return view('nuevo_capataz', $vac);
   }

    public function agregar_capataz(Request $req)
    {


 
        $reglas = [
            'nombre' => 'string|min:0|max:255|unique:capataz',
            

            
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'numeric' => 'El campo :attribute debe ser un numero',
            'unique' => 'El capataz ya existe',

            'integer' => 'El campo :attribute debe ser un numero entero',
        ];

        $this->validate($req, $reglas, $mensajes);

        $capataz_nuevo = new Capataz();
        
        $capataz_nuevo->nombre = $req['nombre'];
      
        
        //grabar
        $capataz_nuevo->save();

      
    


        return redirect('abm_capataz');
    }

    public function edit($id)
    {

        $capat = Capataz::Find($id);
    
        $vac = compact('capat');

        return view('modif_capataz', $vac);
        
    }
    public function update(Request $req, $id)
    {

        $capat = Capataz::Find($id);
        $reglas = [
            'nombre' => 'string|min:0|max:255|unique:capataz',
           
            
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'unique' => 'El capataz ya existe',

            'max' => 'El campo :attribute tiene un maximo de :max',
            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
        ];

        $this->validate($req, $reglas, $mensajes);
        $capat->nombre = $req['nombre'];
       
        
        //grabar
        $capat->save();

        return redirect('abm_capataz');



               
    }


    public function borrar(Request $form)
    //public function borrar($id)
    {
        $id = $form['id'];

        $capat = Capataz::find($id);
        $capat->delete();

        
        return redirect('/abm_capataz');
    }
   
}
