<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capataz;
use App\Cosecha;
use Laracasts\Flash\Flash;

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

        Flash::success('Se ha dado de alta el capataz ' . $capataz_nuevo->nombre . ' de forma exitosa !');

        
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

        if($capat->nombre != $req['nombre'])
        {
            $this->validate($req, $reglas, $mensajes);
            $capat->nombre = $req['nombre'];
            //grabar
            $capat->save();
            Flash::success('Se ha modificado el capataz ' . $capat->nombre . ' de forma exitosa !');
            return redirect('abm_capataz');

        }else
        {
            return redirect('abm_capataz');
        }          
    }


    public function borrar($id){
        $capataz=Capataz::where('id',$id)->with('cosecha')->first();
        if($capataz){
            if($capataz->cosecha->isNotEmpty()){
                Flash('No se puede borrar el Capataz '.$capataz->nombre.' ya que tiene cosechas cargadas')->error();
                return back();
            }
            $capataz->delete();
            Flash::success('Se ha borrado el capataz '.$capataz->nombre.'  de forma exitosa!!!');        
        }else{
            return back()->withErrors('El capataz no existe');
        }
        return redirect('abm_capataz');
    }
   
}
