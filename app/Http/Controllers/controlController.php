<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Control;
use App\Factura;
use App\Quincena;
use App\Cliente;
use App\Empresa;
use PDF;
use Laracasts\Flash\Flash;
use DB;

class controlController extends Controller
{

    /* public function listado()
    {
        $controles = DB::table('control')
        ->join('cliente', 'cliente.id', '=', 'control.id_cliente')
        ->select('control.num_factura', 'control.importe', 'cliente.nombre as cliente')
        ->get();
        dd($controles);
    }*/
   /* public function getdata(Request $request)
    {
        $data = $request->all();
        $this->func1($data);
        $this->func2($data);
    }

    public function func1($data)
    {
        $cliente = $data->get('buscarporcliente');
        $quincena = $data->get('buscarporquincena');

        $controles = Control::orderBy('quincena_id', 'asc')
            ->cliente($cliente)
            ->quincena($quincena)
            ->paginate(10);

        $clientes = Cliente::all();
        $quincenas = Quincena::all();
        $vac = compact('controles', 'clientes', 'quincenas');




        return view('control_quincenal', $vac);
               //Do something with data
    }

    public function func2($data)
    {
        $cliente = $data->get('buscarporcliente');
        $quincena = $data->get('buscarporquincena');

        $controles = Control::orderBy('quincena_id', 'asc')
            ->cliente($cliente)
            ->quincena($quincena)
            ->paginate(10);
        $clientes = Cliente::all();
        $quincenas = Quincena::all();

        $vac = compact('controles', 'clientes', 'quincenas');
        $pdf = PDF::loadview('pdf', compact('controles', 'clientes', 'quincenas'));

        return $pdf->setPaper('a4', 'landscape')
            ->stream('archivo.pdf');//Do somithing with data
    } -*/
    public function listado(Request $request)
    {
        $name_cliente= $request->get('buscarpor');
        $name_quinena=$request->get('por');
        //dd($cliente);
        //$variablesurl = $request->all();
       
        $controles = Control::where('id_cliente', 'like', "%$name_cliente%")
            ->paginate(5);
        $clientes = Cliente::all();
        $quincenas = quincena::all();

        return view('control_quincenal', compact('clientes', 'controles', 'quincenas'));
    }
//para usar scope
    public function indexBuscar(Request $request)
    {

        if (empty($request)) 
        {
            $controles = Control::all();
            $clientes = Cliente::all();
            $quincenas = Quincena::all();
            $vac = compact('controles', 'clientes', 'quincenas');
            return view('control_quincenal', $vac);
        }else
        {
            $cliente = $request->get('buscarporcliente');
            $quincena = $request->get('buscarporquincena');
            //$data = $request->all();
           //dd($cliente, $quincena);
            $varcliente = $cliente;
            $varquincena = $quincena;
            //dd($varcliente);
            $controles = Control::orderBy('fecha','desc')->orderby('id_cliente','desc')->orderby('quincena_id','desc')//ordeno por fecha la vista de la tabla control
                    ->cliente($cliente)
                    ->quincena($quincena)
                    ->paginate(10);
                    
                    $clientes = Cliente::all();
                    $quincenas = Quincena::all();
            $vac = compact('controles', 'clientes', 'quincenas', 'varcliente', 'varquincena');
            return view('control_quincenal', $vac);
        }
        


            }
           
            
            
    public function imprimirBuscar($varcliente, $varquincena)
            {
                
               
                //dd($cliente);
                //dd($quincena);
                $controles = Control::orderBy('fecha', 'desc')
            ->cliente($varcliente)
            ->quincena($varquincena)
            ->paginate();
        
        $pdf = PDF::loadview('pdf', compact('controles'));

            return $pdf->setPaper('legal', 'landscape')
                ->stream('archivo.pdf');
            }

    public function imprimir()
    {
        $controles = Control::orderBy('quincena_id', 'asc')
                     ->paginate();

        $pdf = PDF::loadview('pdf', compact('controles'));

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
        $controles = Control::buscarpor($tipo, $buscar)
            ->paginate(3);

        /*  $controles = Control::buscarpor($tipo, $buscar)
                        ->paginate(3)->appends($variablesurl);*/
        $clientes = Cliente::all();
        $quincenas = Quincena::all();
        $vac = compact('controles', 'clientes', 'quincenas');
        

        return view('control_quincenal', $vac);
    }


   /* public function busqueda(Request $request)
    {
        $noticia = Noticia::with('notas')->get();

        $ntc_turno = $request->input('noticiero_turno');
        if ($ntc_turno) {
            $noticia = Noticia::where('noticiero_turno', 'LIKE', "%$ntc_turno%")
                ->orWhere('noticiero_programa', 'LIKE', "%$ntc_turno%")
                ->orWhere('noticiero_fecha', 'LIKE', "%$ntc_turno%")

                ->paginate(2);

            return view('noticia.listar', array('noticia' => $noticia));
        } else {
            $noticia = Noticia::paginate(3);
            return view('noticia.listar', array('noticia' => $noticia));
        }
    }*/
    public function control(Request $req)
    {
        $controles = Control::all();
        

        // dd($productos);
        $vac = compact('controles');
        return view("control_quincenal", $vac);
    }
  
    public function agregar(Request $req){
        $controles = Control::all();
        $clientes = Cliente::all();
        $quincenas = Quincena::all();
        $empresas = Empresa::all();
        $facturas = Factura::all();

        
        $vac = compact('controles', 'clientes', 'quincenas','empresas','facturas');
        
       return view('nuevo_control_factura', $vac);
   }

    

    public function agregar_control(Request $req)
    {
        
        /*$reglas = [
            'quincena_id' => 'required',
            'id_cliente' => 'required',
            'num_factura' => 'numeric|min:000000000|max:99999999999',
            'importe' => 'numeric|min:0000000000.00|max:9999999999.99',
            //'retencion' => 'numeric|min:0000000|max:9999999999.99',
            'monto_cobrado' => 'numeric|min:0000000|max:9999999999.99',
            'gasto_bancario' => 'numeric|min:0000000|max:9999999999.99',
            'pago_personal' => 'numeric|min:0000000|max:9999999999.99',
            'pago_transporte' => 'numeric|min:0000000|max:9999999999.99',
            'toneladas' => 'numeric|min:0000000|max:9999999999.99',
            'fecha' => 'date',
            'nueve_treintayuno' => 'numeric|min:0000000|max:9999999999.99',
            'bines' => 'numeric|min:0000000|max:9999999999.99',
            'promedio' => 'numeric|min:0000000|max:9999999999.99',
            'diferencia' => 'numeric|min:0000000|max:9999999999.99',
            'importe_a_pagar'=> 'numeric|min:0000000|max:9999999999.99',
                  
        ];
        $mensajes = [
            'string' => 'El campo :attribute debe ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'date' => 'El campo :attribute debe ser fecha',
            'numeric' => 'El campo :attribute debe ser un numero',
            'integer' => 'El campo :attribute debe ser un numero entero',
            'required' => 'El campo :attribute no fue seleccionado',
            'unique' => 'El campo :attribute se encuentra repetido'
        ];

        $this->validate($req, $reglas, $mensajes);*/


        //$collection = collect($req);
        //$plucked = $collection->pluck('id_cliente');
        //var_export($req->all());
        //$plucked->all();
        //dd($req['fecha'],$req['id_cliente'],$req['id_empresa'],$req['promedio'],$collection);
        //$keys = $collection->keys();

        //dd($collection);
        //------------------------------------------------------------------------------------------------

        /*$array = $collection->map(function ($item, $key) {
            return $item;
        });

        $array->all();*/

        //$factura = ($req);

        /*for ($i = 0; $i < count($productos); $i++) {*/

        /* foreach ($factura as $control_nuevo) {
            

                $control_nuevo = new Control();
                //$factura_nuevo = new Factura();
                dd($factura);*/

                $control_nuevo = new Control();

                $control_nuevo->quincena_id = $req['quincena_id'];
                // $control_nuevo->nombre_quincena = $req['quincena_id'];
                $control_nuevo->id_cliente = $req['id_cliente'];
                $control_nuevo->id_empresa = $req['id_empresa'];
                $control_nuevo->num_factura = $req['num_factura'];
                $control_nuevo->importe = $req['importe'];
                //$control_nuevo->retencion = $req['retencion'];
                $control_nuevo->monto_cobrado = $req['monto_cobrado'];
                //$control_nuevo->gasto_bancario = $req['gasto_bancario'];
                //$control_nuevo->libre_dispon = $req['importe']-($req['retencion']+ $req['gasto_bancario']);
                $control_nuevo->pago_personal = $req['pago_personal'];
                //$control_nuevo->pago_transporte = $req['pago_transporte'];
                //$control_nuevo->toneladas = $req['toneladas'];
                $control_nuevo->observaciones = $req['observaciones'];
                $control_nuevo->fecha = $req['fecha'];
                $control_nuevo->nueve_treintayuno = $req['nueve_treintayuno'];
                //$control_nuevo->bines = $req['bines'];
                //$control_nuevo->promedio = $req['promedio'];
                //$control_nuevo->diferencia = $req['diferencia'];
                $control_nuevo->importe_a_pagar = $req['importe_a_pagar'];
                $control_nuevo->cantidad_cosecheros = $req['cantidad_cosecheros'];
                $control_nuevo->cantidad_jornales = $req['cantidad_jornales'];
                $control_nuevo->importe_jornales = $req['importe_jornales'];
                $control_nuevo->cantidad_capataces = $req['cantidad_capataces'];
                $control_nuevo->importe_capataces = $req['importe_capataces'];
                $control_nuevo->cantidad_colectivos = $req['cantidad_colectivos'];
                $control_nuevo->importe_colectivos = $req['importe_colectivos'];
                $control_nuevo->cantidad_maletas = $req['cantidad_maletas'];
                $control_nuevo->cantidad_bines = $req['cantidad_bines'];
                $control_nuevo->cantidad_horas = $req['cantidad_horas'];
                $control_nuevo->promedio = $req['promedio'];
        //print_r($control_nuevo);
        dd($req->all());

                //$id_cliente = $req->input('id_cliente');
                //$id_empresa = $req->input('id_empresa');
                //$promedio = $req->input('promedio');

                //$data = array($control_nuevo);
                //dd($control_nuevo);
                //$data = array($req['id_cliente'],$req['id_empresa'],$req['promedio']);
                /*$data = array("id_cliente"=>$id_cliente,
                              "id_empresa"=>$id_empresa,
                              "promedio"=>$promedio*/
            
                //dd($data);
                /*$datos_a_insertar = array();
                foreach($control_nuevo as $key => $valor){
                    
                    $datos_a_insertar[$key]['id_cliente'] = $control_nuevo->id_cliente;
                    $datos_a_insertar[$key]['id_empresa'] = $control_nuevo->id_empresa;
                    $datos_a_insertar[$key]['promedio'] = $control_nuevo->promedio;
                }
        print_r($datos_a_insertar);
                dd($datos_a_insertar);
                //Control::insert($datos_a_insertar);
                //dd($datos_a_insertar);
                print_r('============================================================================================================================ ');
                print_r($datos_a_insertar);
                dd($datos_a_insertar);

                //DB::table('controles')->insert($datos_a_insertar);
                //$client = DB::table('controles')->select('*')->where('id',$datos_a_insertar)->first();
                //dd($datos_a_insertar);*/

                 /*Control::create($req->all());
        return 'ok';*/


        /*foreach ($control_nuevo['promedio'] as $clave => $valor) {
            echo '<p>', htmlspecialchars('promedio ' .$clave . ' = ' . $valor), '</p>', PHP_EOL;
        };

        foreach ($control_nuevo['id_empresa'] as $clave => $valor) {
            //echo '<p>', htmlspecialchars('Empresa ' . $clave . ' = ' . $valor), '</p>', PHP_EOL;
            $control_nuevo['id_empresa']->save($valor);
        };*/

        //$factura_nuevo->quincena_controles = $req['controles_id'];
        //$factura_nuevo->quincena_controles = $req['quincena_id'];
        //grabar

        //dd($control_nuevo);
        
        /*------------------------------------------------------------*/
        //$control_array = array($req['id_cliente'], $req['id_empresa'] );
        //dd($control_array);

        //dd($control_nuevo);
        //$control_nuevo->toJson();

        /*------------------------------------------------------------*/
        
        //$control=json_encode($control_nuevo);
        //dd($control);
        //$controles = json_decode($control);
        //$nuevocontrol = json_decode($control);
        //dd($control);
        
        /*for($i=0;$i<count($control);$i++){
                $control= new Control();
                $control->id_cliente=$control[$i]->id_cliente;
            }
        dd($control);*/

        /*------------------------------------------------------------*/
           /* $controles_nuevo = collect([
                ['id_cliente'], ['id_empresa']
            ]);
        $keyed = $controles_nuevo->mapWithKeys(function ($item){
                return[$item['id_cliente']=>$item['id_empresa']];
        });

        $keyed->all();*/


        //return $control_nuevo->toJson(JSON_PRETTY_PRINT);
                //$control_nuevo->save();
                //$factura_nuevo->save();

        Flash::success('Se ha dado de alta el control quincenal de forma exitosa !');


        return redirect('control_quincenal');
            
    }

    public function edit($id)
    {

        $control = Control::Find($id);
        $clientes = Cliente::all();
        $quincenas= Quincena::all();

        $vac = compact('control', 'clientes', 'quincenas');

        return view('modif_control', $vac);
        
    }
    public function update(Request $req, $id)
    {

        $control = Control::Find($id);
        $clientes = Cliente::all();
        $quincenas = Quincena::all();
      // dd($req);
        $reglas = [
            //'quincena_id' => 'numeric|min:1|max:30',
           // 'id_cliente' => 'numeric|max:10',

            'num_factura' => 'numeric|min:000000000.00|max:99999999999.99',
            'importe' => 'numeric|min:0000000000.00|max:9999999999.99',
            'retencion' => 'numeric|min:0000000.00|max:9999999999.99',
            'monto_cobrado' => 'numeric|min:0000000.00|max:9999999999.99',
            'gasto_bancario' => 'numeric|min:0000000.00|max:9999999999.99',
            'pago_personal' => 'numeric|min:0000000.00|max:9999999999.99',
            'pago_transporte' => 'numeric|min:0000000.00|max:9999999999.99',
            'toneladas' => 'numeric|min:0000000.00|max:99999999.99',
            
            
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
       
        $control->num_factura = $req['num_factura'];
        $control->importe = $req['importe'];
        $control->retencion = $req['retencion'];
        $control->monto_cobrado = $req['monto_cobrado'];
        $control->gasto_bancario = $req['gasto_bancario'];
        $control->libre_dispon = $req['importe']-($req['retencion']+ $req['gasto_bancario']);
        $control->pago_personal = $req['pago_personal'];
        $control->pago_transporte = $req['pago_transporte'];
        $control->toneladas = $req['toneladas'];
        $control->observacion = $req['observacion'];
        //grabar
        $control->quincena_id = $req['quincena_id'];
        //$control->nombre_quincena = $req['quincena_id'];
        $control->id_cliente = $req['id_cliente'];
        
     /*   foreach($clientes as $cliente)
        {
            if($req['id_cliente'] == $cliente['nombre'])
            {
                $control->id_cliente = $cliente['id'];
            }
        }
        foreach ($quincenas as $quincena) {
            if ($req['quincena_id'] == $quincena['nombre']) {
                $control->quincena_id = $quincena['id'];
                $control->nombre_quincena = $quincena['id'];
            }
        }
        dd($control); */

        $control->save();
        Flash::success('Se ha modificado el control quincenal de forma exitosa !');

        return redirect('control_quincenal');



               
    }


    public function borrar(Request $form)
    //public function borrar($id)
     {
    $id = $form['id'];

    $cosecha = Control::find($id);
    $cosecha->delete();
    //Flash::success('Se ha borrado la cosecha de ' . $cosecha->fecha . ' de forma exitosa !');

    //return redirect('/cosecha')->with('success', 'User deleted successfully');    
    //return view('/cosecha');
    return response()->json(["mensaje" => "borrado"]);
}

    //pdf
    public function index()
    {
        $controles = Control::all()->orderby('fecha','desc');

        return view('list', compact('controles'));
    }

    public function downloadPDF($id)
    {
        $control = Control::find($id);
        $pdf = PDF::loadView('pdf1', compact('control'));

        return $pdf->download('control.pdf');

        
    }
//para verlo este usamos

    public function verPDF($id)
    {
        $control = Control::find($id);
        $pdf = PDF::loadView('pdf1', compact('control'));

        $data = [
            'titulo' => 'Control.net'
        ];

        return $pdf->setPaper('a4', 'portrait')
            ->stream('archivo.pdf');

       // return $pdf->download('control.pdf')
        ;

        //para verlo
    }
    //para ver y apaisar la hoja
   /* public function download()
    {
        $data = [
            'titulo' => 'Styde.net'
        ];

        return PDF::loadView('vista-pdf', $data)
            ->setPaper('a4', 'landscape')
            ->stream('archivo.pdf');
    }*/
}
