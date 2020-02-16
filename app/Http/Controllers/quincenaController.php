<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\quincena;
use App\Control;
use Laracasts\Flash\Flash;

use Illuminate\Http\Request;


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


        Flash::success('Se ha dado de alta la quincena ' . $quincena_nuevo->nombre . ' de forma exitosa !');



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

        Flash::success('Se ha modificado la quincena ' . $quincena_nuevo->nombre . ' de forma exitosa !');

    


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

        if($quincena->nombre != $req['nombre'])
        {
            $this->validate($req, $reglas, $mensajes);
            $quincena->nombre = $req['nombre'];
            //grabar
            $quincena->save();
            Flash::success('Se ha modificado la quincena ' . $quincena->nombre . ' de forma exitosa !');

            return redirect('abm_quincena');
        }else
        {
            return redirect('abm_quincena');
    
        }        
    }

    public function borrar($id)
    {
        $quincena = Quincena::where('id', $id)->with('control')->first();
        if ($quincena) {
            if ($quincena->control->isNotEmpty()) {
                Flash('No se puede borrar la quincena ' . $quincena->nombre . ' ya que tiene datos asociados')->error();
                return back();
            }
            $quincena->delete();
            Flash::success('Se ha borrado la quincena ' . $quincena->nombre . '  de forma exitosa!!!');
        } else {
            return back()->withErrors('La quincena no existe');
        }
        return redirect('abm_quincena');
    }
}
