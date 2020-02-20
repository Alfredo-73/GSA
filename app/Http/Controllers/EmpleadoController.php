<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Capataz;
use App\Sancion;
use App\Empleado;

use PDF;
use Laracasts\Flash\Flash;
use DB;

class EmpleadoController extends Controller
{
    //
    public function listadoempleado(Request $request)
    {
        $name_cliente = $request->get('buscarpor');
        $name_quinena = $request->get('por');
        //dd($cliente);
        //$variablesurl = $request->all();

        $empleados = Empleado::where('id_cliente', 'like', "%$name_cliente%")
            ->paginate(10);
        $clientes = Cliente::all();
        $capataz = Capataz::all();

        return view('empleado_quincenal', compact('clientes', 'empleados', 'capataz'));
    }

    //para usar scope
    public function indexBuscar(Request $request)
    {
   // $cantidad_sanciones = 0;
        if(empty($request))
        {
            $sanciones = Sancion::all();
            $capataz = Capataz::all();
            $empresa = Empresa::all();  
            $empleados = Empleado::all();
            
            $vac = compact('empleados', 'sanciones', 'capataz', 'empresa', 'cantidad_sanciones');
//dd($vac);



            return view('empleado', $vac);
        }else
        {
            $nombres = $request->get('buscarpornombre');
            $apellidos = $request->get('buscarporapellido');
            //$data = $request->all();
            //dd($sanciones, $quincena);
            //  $varsanciones = $sanciones;
            //$varcapataz = $capataz;
            //dd($varsanciones);
            $empleados = Empleado::orderBy('apellido', 'asc')
                ->nombres($nombres)
                ->apellidos($apellidos)
                ->paginate(10);

            $sanciones = Sancion::all();
            $capataz = Capataz::all();
            $empresa = Empresa::all();

            $vac = compact('empleados', 'sanciones', 'capataz', 'empresa', 'nombres', 'apellidos');




            return view('empleado', $vac);
        }
        
    }



    public function imprimirBuscar($varsanciones, $varcapataz)
    {


        //dd($cliente);
        //dd($quincena);
        $empleados = Empleado::orderBy('apellido', 'asc')
            ->sanciones($varsanciones)
            ->capataz($varcapataz)
            ->paginate();

        $pdf = PDF::loadview('pdf', compact('empleados'));

        return $pdf->setPaper('legal', 'landscape')
            ->stream('archivo.pdf');
    }

    public function imprimir()
    {
        $empleados = Empleado::orderBy('apellido', 'asc')
            ->paginate();

        $pdf = PDF::loadview('pdf', compact('empleados'));

        return $pdf->setPaper('legal', 'landscape')
            ->stream('archivo.pdf');
    }
    //usando scope global y select
    public function buscarpor(Request $request)
    {
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');
        //$variablesurl = $request->all();
        /*$variablesurl = [
            'tipo' => $tipo,
            'buscarpor' => $buscar
        ];*/
        //$variablesurl = $request->input();
        //$variablesurl = $request->query();
        $variablesurl = $request->only(['tipo', 'buscarpor']);
        // $variablesurl = $request->except(['page']);
        //$variablesurl = $_GET;

        //dd($variablesurl);
        $empleados = Empleado::buscarpor($tipo, $buscar)
            ->paginate(3);

        /*  $empleados = Empleado::buscarpor($tipo, $buscar)
                        ->paginate(3)->appends($variablesurl);*/
        $sanciones = Sancion::all();
        $capataz = Capataz::all();
        $vac = compact('empleados', 'sanciones', 'capataz');


        return view('empleado', $vac);
    }


    public function listado(Request $request)
    {
        $buscasanciones = trim($request->get('buscarporsanciones'));

        $buscacapataz = trim($request->get('buscarporcapataz'));
        //dd($fechadesde, $fechahasta, $buscacapataz);
        $varbuscasanciones = $buscasanciones;

        $varbuscacapataz = $buscacapataz;

       $empresas = Empresa::all();
        $sanciones = Sancion::all()->sortBy('legajo');
        $empleados = Empleado::all();
        $capataz = Capataz::all();

        // dd($sanciones);
        $vac = compact('sanciones', 'empleados', 'empresas', 'capataz');
        return view("empleado", $vac);
    }

    public function agregar(Request $req)
    {
        $sanciones = Sancion::all();
        $capataz = Capataz::all();
        $empresas = Empresa::all();


        $vac = compact('capataz', 'sanciones', 'empresas');
        return view('nuevo_empleado', $vac);
    }

    public function agregar_empleado(Request $req)
    {
        //dd($req);
        $reglas = [
            // 'id_cliente' => 'numeric|max:10',
            'legajo' => 'numeric|max:99999999999999999999',
            'nombre' => 'string|min:0|max:100',
            'apellido' => 'string|min:0|max:100',
            'dni' => 'numeric|max:999999999',
            'observacion' => 'string|min:0|max:300',
            'id_empresa' => 'required',
            'id_capataz' => 'required'

            // 'id_capataz' => 'numeric|max:10',
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'date' => 'El campo :attribute debe ser fecha',
            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
            'unique' => 'El campo :attribute se encuentra repetido',
            'required' => 'El campo :attribute no fue seleccionado'
        ];

        $this->validate($req, $reglas, $mensajes);

        $empleado_nuevo = new Empleado();

        $empleado_nuevo->legajo = $req['legajo'];
        $empleado_nuevo->nombre = $req['nombre'];
        $empleado_nuevo->apellido = $req['apellido'];
        $empleado_nuevo->dni = $req['dni'];
        $empleado_nuevo->cuil = $req['cuil'];
        $empleado_nuevo->fecha_ingreso = $req['fecha_ingreso'];
        $empleado_nuevo->fecha_egreso = $req['fecha_egreso'];
      

           $empleado_nuevo->id_empresa = $req['id_empresa'];
      
       // $empleado_nuevo->id_empresa = null;
        $empleado_nuevo->id_sanciones = null;

       // $empleado_nuevo->id_sanciones = $req['id_sanciones'];
       

           $empleado_nuevo->id_capataz = $req['id_capataz'];
       
        $empleado_nuevo->avatar = 'avatar.jpg';

        $empleado_nuevo->observaciones = $req['observaciones'];
        //dd($empleado_nuevo);
        //grabar
        $empleado_nuevo->save();


        Flash::success('Se ha dado de alta la empleado de ' . $empleado_nuevo->apellido . ' de forma exitosa !');



        return redirect('empleado');
    }

    public function edit($id)
    {

        $empleado = Empleado::Find($id);
        $empresas = Empresa::all();
        $capataz = Capataz::all();
        $sanciones = Sancion::all();
       $cantidad_sanciones = 0;
       $vac = compact('empleado', 'empresas', 'capataz', 'sanciones');

        return view('modif_empleado', $vac);
    }
    public function update(Request $req, $id)
    {
        //dd($req);
        $empleado = Empleado::Find($id);
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

        //dd($empleado);
        $this->validate($req, $reglas, $mensajes);

        $empleado->legajo = $req['legajo'];
        $empleado->nombre = $req['nombre'];
        $empleado->apellido = $req['apellido'];
        $empleado->dni = $req['dni'];
        $empleado->cuil = $req['cuil'];

        $empleado->fecha_ingreso = $req['fecha_ingreso'];
        $empleado->fecha_egreso = $req['fecha_egreso'];
        $empleado->id_empresa = $req['id_empresa'];

      //  $empleado->id_sanciones = $req['id_sanciones'];
        $empleado->id_capataz = $req['id_capataz'];
        $empleado->avatar = 'avatar.jpg';

        
        $empleado->observaciones = $req['observacion'];
        //grabar

        $empleado->save();
        Flash::success('Se ha modificado la empleado de ' . $empleado->apellido . ' de forma exitosa !');

        return redirect('empleado');
    }


    public function borrar(Request $form)
    //public function borrar($id)
    {
        $id = $form['id'];

        $empleado = Sancion::find($id);
        $empleado->delete();
        Flash::success('Se ha borrado la empleado de ' . $empleado->legajo . ' de forma exitosa !');


        return redirect('/empleado');
    }

    //pdf
    public function index()
    {
        $empleados = Empleado::all();

        return view('list', compact('empleados'));
    }
    public function verPDF($id)
    {
        $empleado = Empleado::find($id);
        $pdf = PDF::loadView('pdf1', compact('empleado'));

        $data = [
            'titulo' => 'Empleado.net'
        ];

        return $pdf->setPaper('a4', 'portrait')
            ->stream('archivo.pdf');

            // return $pdf->download('empleado.pdf')
        ;

        //para verlo
    }
    public function search()
    {
        $buscar = $_GET['texto'];

        $empleados = Empleado::where('nombre', 'like', "%$buscar%")
            ->orwhere('apellido', 'like', "%$buscar%")->get();

        $vac = compact('empleados');

        return view('empleado', $vac);
    }

}
