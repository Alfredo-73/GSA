<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use Laracasts\Flash\Flash;

class empresaController extends Controller
{
    public function listado(Request $req)
    {
        $empresa = Empresa::all()->sortBy('razon_social');

        // dd($productos);
        $vac = compact('empresa');
        return view("abm_empresa", $vac);
    }

    public function agregar(Request $req)
    {
        $empresas = Empresa::all();

        $vac = compact('empresas');

        return view('nueva_empresa', $vac);
    }

    public function empresa(Request $req)
    {
        
        $reglas = [
            'razon_social' => 'string|min:0|max:255',
            'cuit' => 'integer',
            'domicilio' => 'string|min:0|max:255|',
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'numeric' => 'El campo :attribute debe ser un numero',
            'unique' => 'La razon social ya existe',

            'integer' => 'El campo :attribute debe ser un numero',
        ];

        $this->validate($req, $reglas, $mensajes);

        $empresa_nueva = new Empresa();
        
        $empresa_nueva->razon_social = $req['razon_social'];
        $empresa_nueva->cuit = $req['cuit'];
        $empresa_nueva->domicilio = $req['domicilio'];
        

        
        Flash::success('Se ha dado de alta la razon social ' . $empresa_nueva->razon_social . ' de forma exitosa !');
        
        //grabar
        $empresa_nueva->save();

        return redirect('abm_empresa');
    }

    public function edit($id)
    {
        $empresa = empresa::Find($id);

        $vac = compact('empresa');

        return view('modif_empresa', $vac);
    }

    public function update(Request $req, $id)
    {
        $emp = Empresa::Find($id);
        $reglas=['razon_social' => 'string|min:0|max:255|unique:razon_social',
            'cuit' => 'numeric|min:0|max:11|unique:razon_social',
            'domicilio' => 'string|min:0|max:255|',
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'numeric' => 'El campo :attribute debe ser un numero',
            'unique' => 'La razon social ya existe',

            'integer' => 'El campo :attribute debe ser un numero entero',
        ];

        if ($emp->razon_social != $req['razon_social']) {
            $this->validate($req, $reglas, $mensajes);
            $emp->razon_social = $req['razon_social'];
            //grabar
            $emp->save();
            Flash::success('Se ha modificado la razon social ' . $emp->razon_social . ' de forma exitosa !');
            return redirect('abm_empresa');
        }else if
            ($emp->razon_social != $req['cuit']) {
            $this->validate($req, $reglas, $mensajes);
            $emp->razon_social = $req['cuit'];
            //grabar
            $emp->save();
            Flash::success('Se ha modificado la cuit ' . $emp->cuit . ' de forma exitosa !');
            return redirect('abm_empresa');
        } else if ($emp->domicilio != $req['domicilio']) {
            $this->validate($req, $reglas, $mensajes);
            $emp->domicilio = $req['domicilio'];
            //grabar
            $emp->save();
            Flash::success('Se ha modificado el domicilio ' . $emp->domicilio . ' de forma exitosa !');
            return redirect('abm_empresa');
        }
    }

    public function borrar($id)
    { {
            $empresa = Empresa::where('id', $id)->with('personal')->get();
            $empresa1 = Empresa::where('id', $id)->with('empleados')->get();
            if ($empresa || $empresa1) {
                if ($empresa1->personal->isNotEmpty() || $empresa->empleados->isNotEmpty()) {
                    Flash('No se puede borrar el cliente ' . $empresa->razon_social . ' ya que tiene datos asociados')->error();
                    return back();
                }
                $empresa->delete();
                Flash::success('Se ha borrado el cliente ' . $empresa->razon_social . '  de forma exitosa!!!');
            } else {
                return back()->withErrors('La Razon Social no existe');
            }
            return redirect('abm_empresa');
        }
    }
}

