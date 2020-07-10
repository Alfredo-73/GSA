<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Capataz;
use App\Sancion;
use App\Empleado;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmpleadosExport;
use App\Imports\EmpleadosImport;
use File;
use PDF;
use Laracasts\Flash\Flash;
use DB;
use Illuminate\Notifications\Messages\DatabaseMessage;

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
        $clientes = Empresa::all();
        $capataz = Capataz::all();

        return view('empleado_quincenal', compact('clientes', 'empleados', 'capataz'));
    }

    //para usar scope
    //usamos para ver el listado de empleados
    public function indexBuscar(Request $request)
    {

        // $cantidad_sanciones = 0;
        if (empty($request)) {
            $sanciones = Sancion::all();
            $capataz = Capataz::all();
            $empresa = Empresa::all();
            $empleados = Empleado::orderby('legajo', 'asc');
            $buscanombre = Empleado::where('nombre', 'like', $request->nombre . "%")->get();

            $vac = compact('empleados', 'sanciones', 'capataz', 'empresa', 'cantidad_sanciones', 'buscanombre');
            //dd($vac);
            return view('empleado', $vac);
        } else {
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
                ->orderby('legajo', 'asc')
                ->paginate(10);

            $sanciones = Sancion::all();
            $capataz = Capataz::all();
            $empresa = Empresa::all();
            $buscanombre = Empleado::where('nombre', 'like', $request->nombre . "%")
                ->orderby('legajo', 'asc')
                ->get();

            $vac = compact('empleados', 'sanciones', 'capataz', 'empresa', 'nombres', 'apellidos', 'buscanombre');


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
            'legajo' => 'numeric|max:99999999999999999999|unique:empleados',
            'nombre' => 'string|min:0|max:100',
            'apellido' => 'string|min:0|max:100',
            'dni' => 'numeric|max:999999999',
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
            'unique' => 'El :attribute ya existe, elija uno distinto',
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

        
        //dd($empleado_nuevo);
        //grabar
        $empleado_nuevo->save();


        Flash::success('Se ha dado de alta al empleado ' . $empleado_nuevo->apellido . ' de forma exitosa !');



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

        dd($empleado);
        
    }
    
    public function update(Request $req, $id)
    {
        //dd($req);
        $empleado = Empleado::Find($id);
        $reglas = [
            // 'id_cliente' => 'numeric|max:10',
            'legajo' => 'numeric|max:9999999999|:empleados',
            'nombre' => 'string|min:0|max:100',
            'apellido' => 'string|min:0|max:100',
            'dni' => 'numeric|max:999999999',
            'dias' => 'numeric|max:999',
            'fecha' => 'date',
            'reincorporacion' => 'date',
            'motivo' => 'string|max:300',
            

            // 'id_capataz' => 'numeric|max:10',
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'date' => 'El campo :attribute debe ser fecha',
            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
            'unique' => 'El campo :attribute ya existe'
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


        $empleado->observacion = $req['observacion'];
        //grabar

        $empleado->save();
        Flash::success('Se ha modificado la empleado de ' . $empleado->apellido . ' de forma exitosa !');

        return redirect('empleado');
    }


    public function borrar(Request $form)
    //public function borrar($id)
    {
        $id = $form['id'];

        $empleado = Empleado::find($id);
        //dd($empleado);
        $empleado->delete();
        //Flash::success('Se ha borrado el empleado' . $empleado->legajo . " " . $empleado->nombre . "," . $empleado->apellido .' de forma exitosa !');

        return response()->json(["mensaje" => "Empleado Borrado.$empleado"]);
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

    public function buscador(Request $request)
    {
        //$busca = $_GET['nombre'];

        $empresas = Empresa::all();
        $capataz = Capataz::all();
        $sanciones = Sancion::all();
        $empleados = Empleado::where('nombre', 'like', $request->nombre . "%")
            ->orderby('legajo', 'asc')
            ->get();

        $vac = compact('empleados', 'empresas', 'capataz', 'sanciones');
        //dd($vac);
        return view('empleado', $vac);
    }

    public function validacion(Request $request)
    {
        //$empresas = Empresa::all();
        //$capataz = Capataz::all();
        //$sanciones = Sancion::all();
        $empleados = Empleado::where('legajo', '=', $request->legajo . "%")
            ->select('legajo')
            ->get();

        //$vac = compact('empleados','empresas','capataz','sanciones');

        //$vac = compact('empleados');
        //dd($empleados);
        //return view('nuevo_empleado', $vac);
        return response()->json([$empleados]);
    }

    public function exportExcel()
    {
        return Excel::download(new EmpleadosExport, 'listado_de_empleados.xlsx');
    }
    
    public function importExcel(Request $req){
        //dd($req);

        if ($req->hasFile('file')) 
        { 
            $extension = File::extension($req->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv")
             { //'Your file is a valid xls or csv file'
                $file = $req->file('archivo');

                Excel::import(new EmpleadosImport, $file);
                return back()->with('message', 'Importacion de Empleados completada');
            }
               else { //'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return redirect()->back()->with('message', 'Por favor suba un archivo valido xls o xlsx');
            } 
        }else{

           return redirect()->back()->with('message', 'Por favor suba un archivo valido xls o xlsx');

        }

   /*     $validator = Validator::make(
            [
                'file'      => $req->file,
                'extension' => strtolower($req->file->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required',
                'extension'      => 'required|in:xlsx,xls',
            ]

        );
        if (Input::hasFile('file')) {
            $uploadedFileMimeType = Input::file('file')->getMimeType();

            $mimes = array('application/excel', 'application/vnd.ms-excel', 'application/vnd.msexcel');

            if (in_array($_FILES['file']['type'], $mimes)) {

                $file = $req->file('archivo');

                Excel::import(new EmpleadosImport, $file);
                return back()->with('message', 'Importacion de Empleados completada');
//True
            } else {

                return redirect()->back()->withInput()->withFlashDanger("Please select Only Excel File");
            }
        }*/
        

}



}
