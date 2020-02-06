<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sancion;
use App\Capataz;
use App\Cliente;
use PDF;
use Laracasts\Flash\Flash;
use dateTranslator;


class SancionController extends Controller
{
    public function listado(Request $request)
    {
        $fechadesde = trim($request->get('fechadesde'));
        $fechahasta = trim($request->get('fechahasta'));
        $buscacapataz = trim($request->get('buscacapataz'));
        //dd($fechadesde, $fechahasta, $buscacapataz);
        $varfechadesde = $fechadesde;
        $varfechahasta = $fechahasta;
        $varbuscacapataz = $buscacapataz;

        if ($varfechadesde == null && $varfechadesde == null) {
            $varfechadesde = 0000 - 00 - 00;
            $varfechahasta = 0000 - 00 - 00;
        }
        $sanciones = Sancion::all()->sortBy('legajo');
        $clientes = Cliente::all();
        $capataz = Capataz::all();

        // dd($sanciones);
        $vac = compact('sanciones', 'clientes', 'capataz');
        return view("sancion", $vac);
    }

    public function agregar(Request $req)
    {
        $clientes = Cliente::all();
        $capataz = Capataz::all();

        $vac = compact('capataz', 'clientes');
        return view('nueva_sancion', $vac);
    }

    public function agregar_sancion(Request $req)
    {
        $reglas = [
            // 'id_cliente' => 'numeric|max:10',
            'legajo' => 'numeric|max:9999999999',
            'nombre' => 'string|min:0|max:100',
            'apellido' => 'string|min:0|max:100',
            'dni' => 'numeric|max:999999999',
            'dias' => 'numeric|max:999',
            'fecha' => 'date',
            'reincorporacion' => 'date',
            'motivo' => 'string|max:300',
            'observacion' => 'string|min:0|max:300',

            // 'id_capataz' => 'numeric|max:10',
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

        $sancion_nueva = new Sancion();

        $sancion_nueva->legajo = $req['legajo'];
        $sancion_nueva->nombre = $req['nombre'];
        $sancion_nueva->apellido = $req['apellido'];
        $sancion_nueva->dni = $req['dni'];
        $sancion_nueva->id_cliente = $req['id_cliente'];
        $sancion_nueva->id_capataz = $req['id_capataz'];
        $sancion_nueva->dias = $req['dias'];
        $sancion_nueva->motivo = $req['motivo'];
        
        $sancion_nueva->observacion = $req['observacion'];
        $sancion_nueva->fecha = $req['fecha'];
        $fecha = $sancion_nueva->fecha;
        $var_fecha = $req['dias'] +1;
        $nueva_fecha = strtotime('+'. $var_fecha .'day', strtotime($fecha));

        $nueva_fecha = date('Y-m-j', $nueva_fecha);
        //dd($nueva_fecha);

        $sancion_nueva->reincorporacion = $nueva_fecha;
        //grabar
        $sancion_nueva->save();


        Flash::success('Se ha dado de alta la sancion de ' . $sancion_nueva->legajo . ' de forma exitosa !');



        return redirect('sancion');
    }

    public function edit($id)
    {

        $sancion = Sancion::Find($id);
        $clientes = Cliente::all();
        $capataz = Capataz::all();

        $vac = compact('sancion', 'clientes', 'capataz');

        return view('modif_sancion', $vac);
    }
    public function update(Request $req, $id)
    {
        //dd($req);
        $sancion = sancion::Find($id);
        $reglas = [
            // 'id_cliente' => 'numeric|max:10',
            'legajo' => 'numeric|max:9999999999',
            'nombre' => 'string|min:0|max:100',
            'apellido' => 'string|min:0|max:100',
            'dni' => 'numeric|max:999999999',
            'dias' => 'numeric|max:999',
            'fecha' => 'date',
            'reincorporacion' => 'date',
            'motivo' => 'string|max:300',
            'observacion' => 'string|min:0|max:300',

            // 'id_capataz' => 'numeric|max:10',
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

        //dd($sancion);
        $this->validate($req, $reglas, $mensajes);

        $sancion->legajo = $req['legajo'];
        $sancion->nombre = $req['nombre'];
        $sancion->apellido = $req['apellido'];
        $sancion->dni = $req['dni'];
        $sancion->id_cliente = $req['id_cliente'];
        $sancion->id_capataz = $req['id_capataz'];
        $sancion->dias = $req['dias'];
        $sancion->fecha = $req['fecha'];
       /* $sancion->reincorporacion = $req['reincorporacion'];*/
        $sancion->motivo = $req['motivo'];


         $fecha = $sancion->fecha;
        $var_fecha = $req['dias'] +1;
        $nueva_fecha = strtotime('+'. $var_fecha .'day', strtotime($fecha));

        $nueva_fecha = date('Y-m-j', $nueva_fecha);
        //dd($nueva_fecha);

        $sancion->reincorporacion = $nueva_fecha;
        $sancion->observacion = $req['observacion'];
        //grabar

        $sancion->save();
        Flash::success('Se ha modificado la sancion de ' . $sancion->legajo . ' de forma exitosa !');

        return redirect('sancion');
    }


    public function borrar(Request $form)
    //public function borrar($id)
    {
        $id = $form['id'];

        $sancion = Sancion::find($id);
        $sancion->delete();
        Flash::success('Se ha borrado la sancion de ' . $sancion->legajo . ' de forma exitosa !');


        return redirect('/sancion');
    }

    public function verPDF($id)
    {
        $sancion = Sancion::find($id);
        $pdf = PDF::loadView('pdf1', compact('sancion'));

        $data = [
            'titulo' => 'Control.net'
        ];

        return $pdf->setPaper('a4', 'portrait')
            ->stream('archivo.pdf');

            // return $pdf->download('control.pdf')
        ;

        //para verlo
    }
    public function search()
    {
        $buscar = $_GET['texto'];

        $sanciones = Sancion::where('nombre', 'like', "%$buscar%")
            ->orwhere('apellido', 'like', "%$buscar%")->get();

        $vac = compact('sanciones');

        return view('sancion', $vac);
    }

    //
}
