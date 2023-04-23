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
use Arr;
use Carbon\Carbon;

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

        $facturas = $request->id_factura;
        //dd($facturas);


        $name_cliente= $request->get('buscarpor');
        $name_quinena=$request->get('por');
        //dd($cliente);
        //$variablesurl = $request->all();
       
        $controles = Control::where('id_cliente', 'like', "%$name_cliente%")->orderby('id_factura','asc')
            ->paginate(5);
        $clientes = Cliente::all();
        $quincenas = quincena::all();


        return view('control_quincenal', compact('clientes', 'controles', 'quincenas','total_importe'));
    }
    //para usar scope
    public function indexBuscar(Request $request)
    {
        //$users = DB::table('users')->get();
        

        if (empty($request)) 
        {
            $controles = Control::all();
            $clientes = Cliente::all();
            $quincenas = Quincena::all();
            $vac = compact('controles', 'clientes', 'quincenas');
            return view('control_quincenal', $vac);
        }else{
            $cliente = $request->get('buscarporcliente');
            $quincena = $request->get('buscarporquincena');
            //$data = $request->all();
           //dd($cliente, $quincena);
            $varcliente = $cliente;
            $varquincena = $quincena;
            //dd($varcliente);
            $controles = Control::orderby('id_factura','desc')->orderBy('fecha','desc')->orderby('id_cliente','desc')->orderby('quincena_id','desc')//ordeno por fecha la vista de la tabla control
                    ->cliente($cliente)
                    ->quincena($quincena)
                    ->paginate(28);
                    
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
        
        $vac = compact('controles', 'clientes', 'quincenas','empresas','facturas');
        
       return view('nuevo_control_factura', $vac);
    }

    
    public function agregar_control(Request $request)
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

        
        $id_cliente = $request->input('id_cliente');
        $id_empresa = $request->input('id_empresa');
        $num_factura = $request->input('num_factura');
        $monto_cobrado = $request->input('monto_cobrado');
        $importe = $request->input('importe');
        $importe_a_pagar = $request->input('importe_a_pagar');
        $nueve_treintayuno = $request->input('nueve_treintayuno');
        $pago_personal = $request->input('pago_personal');
        $importe_cosecheros = $request->input('importe_cosecheros');
        $cantidad_cosecheros = $request->input('cantidad_cosecheros');
        $cantidad_jornales = $request->input('cantidad_jornales');
        $importe_jornales = $request->input('importe_jornales');
        $cantidad_capataces = $request->input('cantidad_capataces');
        $importe_capataces = $request->input('importe_capataces');
        $cantidad_colectivos = $request->input('cantidad_colectivos');
        $importe_colectivos = $request->input('importe_colectivos');
        $cantidad_maletas = $request->input('cantidad_maletas');
        $cantidad_bines = $request->input('cantidad_bines');
        $cantidad_horas = $request->input('cantidad_horas');
        $promedio = $request->input('promedio');
        $total_liquidacion = $request->input('total_liquidacion');
        $orden_de_pago = $request->input('orden_de_pago');
        $anticipo = $request->input('anticipo');
        $saldo = $request->input('saldo');
        $total_pagado = $request->input('total_pagado');
        $kilos = $request->input('kilos');
        $iva = $request->input('iva');
        $toneladas = $request->input('toneladas');
        $factura = Control::max('id_factura');
        
        foreach ($request->input('id_cliente') as $key => $value){
            $control_nuevo = new Control();
            $control_nuevo->fecha = $request->input('fecha');
            $control_nuevo->quincena_id = $request->input('quincena_id');
            $control_nuevo->id_cliente = $id_cliente[$key];
            $control_nuevo->id_empresa = $id_empresa[$key];
            $control_nuevo->num_factura = $num_factura[$key];
            $control_nuevo->importe = $importe[$key];
            $control_nuevo->monto_cobrado = $monto_cobrado[$key];
            $control_nuevo->importe_a_pagar = $importe_a_pagar[$key];
            $control_nuevo->nueve_treintayuno = $nueve_treintayuno[$key];
            $control_nuevo->pago_personal = $pago_personal[$key];
            $control_nuevo->cantidad_cosecheros = $cantidad_cosecheros[$key];
            $control_nuevo->cantidad_jornales = $cantidad_jornales[$key];
            $control_nuevo->importe_jornales = $importe_jornales[$key];
            $control_nuevo->cantidad_capataces = $cantidad_capataces[$key];
            $control_nuevo->importe_capataces = $importe_capataces[$key];
            $control_nuevo->cantidad_colectivos = $cantidad_colectivos[$key];
            $control_nuevo->importe_colectivos = $importe_colectivos[$key];
            $control_nuevo->cantidad_maletas = $cantidad_maletas[$key];
            $control_nuevo->cantidad_bines = $cantidad_bines[$key];
            $control_nuevo->cantidad_horas = $cantidad_horas[$key];
            $control_nuevo->promedio = $promedio[$key];
            $control_nuevo->importe_cosecheros = $importe_cosecheros[$key];
            $control_nuevo->total_liquidacion = $total_liquidacion[$key];
            $control_nuevo->orden_de_pago = $orden_de_pago[$key];
            $control_nuevo->anticipo = $anticipo[$key];
            $control_nuevo->saldo = $saldo[$key];
            $control_nuevo->total_pagado = $total_pagado[$key];
            $control_nuevo->kilos = $kilos[$key];
            $control_nuevo->iva = $iva[$key];
            $control_nuevo->toneladas = $toneladas[$key];
            $control_nuevo->id_factura = $factura + 1;
            $control_nuevo->observacion = $request->input('observacion');
            //print_r($control_nuevo);
            $control_nuevo->save();
            //==================================GENERO ARCHIVO JSON COMO ARRAY=======================================
            /*$array = ['fecha' => $request['fecha'], 'quincena_id' => $request['quincena_id'], 'id_cliente' => $request['id_cliente'], 'id_empresa' => $request['id_empresa'], 'importe' => $request['importe'], 'num_factura' => $request['num_factura']];
            return response()->json($array);*/       
        }
        if ($control_nuevo->save()) {
            return redirect('resumen_control')->with('msj', 'Datos Guardados Correctamente', '&nbsp');
        } else {
            return redirect('resumen_control')->with('errormsj','No se guardaron los datos','&nbsp');
        }
        //Flash::success('Se ha dado de alta el control quincenal de forma exitosa !');
        //return redirect('control_quincenal');


        /*foreach ($request->input() as $value) {
            //$control_nuevo->bines = $request['bines'];
            $datos_a_insertar = new Control();
            $datos_a_insertar->fecha = $request->fecha;
            $datos_a_insertar->quincena_id = $request->quincena_id;
            $datos_a_insertar->id_cliente = $request->id_cliente;

            //$datos_a_insertar[$key]['fecha'] = $request->fecha;
            //$datos_a_insertar[$key]['quincena_id'] = $request->quincena_id;
            //$datos_a_insertar[$key]['id_cliente'] = $request->id_cliente;
            //$datos_a_insertar[$key]['id_empresa'] = $request->id_cliente;
            //$datos_a_insertar[$key]['num_factura'] =$request->id_empresa;
            //$datos_a_insertar[$key]['monto_cobrado'] = $request->monto_cobrado;
            //$datos_a_insertar[$key]['importe'] = $request->importe;
            //$datos_a_insertar[$key]['importe_a_pagar'] = $request->importe_a_pagar;
            //$datos_a_insertar[$key]['nueve_treintayuno'] = $request->nueve_treintayuno;
            $datos = implode(',', $datos_a_insertar['fecha']);
            dd($datos);
            //Después almacenas $string_programa en la DB
            DB::table('Controles')->insert($datos);
            
            //printf($datos_a_insertar);
            dd($datos_a_insertar);
            
            /*DB::table('Controles')->insert($datos_a_insertar);
            Flash::success('Se ha dado de alta el control quincenal de forma exitosa !');
            return redirect('control_quincenal');
            //dd($datos_a_insertar);
        }*/
        
        /*$data = array('fecha'=>$request['fecha'], 'quincena_id'=>$request['quincena_id'], 'id_cliente'=>$request['id_cliente'], 'id_empresa'=>$request['id_empresa'],'num_factura'=>$request['num_factura']);
        $datos_a_insertar = array();
        $array = ['fecha' => $request['fecha'], 'quincena_id' => $request['quincena_id'], 'id_cliente' => $request['id_cliente']];

        $toImplode = array($data);
        //dd($toImplode);

        foreach ($toImplode as $key => $value) {
            $toImplode[] = "$key: $value" . '<br>';
            dd($toImplode);
        }
        
        $imploded = implode('', $toImplode);

        echo($imploded);*/

        //var_dump(implode(",", $array)); 

        /*foreach ($request->all() as $key =>$client);
        //dd($request);
        {
            //dd($client);
            $datos_a_insertar[$key]['fecha'] = $request->fecha;
            $datos_a_insertar[$key]['quincena_id'] = $request->quincena_id;
            $datos_a_insertar[$key]['id_cliente'] = $request->id_cliente;
            $datos_a_insertar[$key]['id_empresa'] = $request->id_empresa;
            $datos_a_insertar[$key]['num_factura'] = $request->num_factura;
        }*/
        /*foreach ($request as $key => $value) {
            $fecha = $request->input('fecha');
            $quincena_id = $request->input('quincena_id');
            $id_cliente = $request->input('id_cliente');
            $id_empresa = $request->input('id_empresa');
            $num_factura = $request->input('num_factura');

            $datos_a_insertar = new Control();
            $datos_a_insertar->fecha = $fecha;
            $datos_a_insertar->id_cliente = $id_cliente;
            $datos_a_insertar->quincena_id = $quincena_id;
            $datos_a_insertar->id_empresa = $id_empresa;
            $datos_a_insertar->num_factura = $num_factura;
            //$datos_a_insertar->save();    
        }
        
        dd($datos_a_insertar);
        //Control::insert($datos_a_insertar);
        //DB::table('Controles')->insert($datos_a_insertar);
        Flash::success('Se ha dado de alta el control quincenal de forma exitosa !');
        return redirect('control_quincenal');*/
        //dd($data);

        /*$id_cliente = $request['id_cliente'];
        $id_empresa = $request['id_empresa'];
        $num_factura = $request['num_factura'];
        $monto_cobrado = $request['monto_cobrado'];
        $importe = $request['importe'];
        $importe_a_pagar = $request['importe_a_pagar'];
        $nueve_treintayuno = $request['nueve_treintayuno'];
        $control_nuevo = new Control();
        //$control_nuevo = Control::create(['id_cliente' => $id_cliente, 'id_empresa' => $id_empresa, 'num_factura' => $num_factura]);
        
        //print_r($request->all());
        //dd($request);

        for($i=0; $i=count($request->all()) ; $i++) {
            foreach ($id_cliente as $key => $cliente) {
                echo "<br>cliente:" . $cliente;
                //$control_nuevo = new Control();
                //dd($control_nuevo);
                $control_nuevo->id_cliente = $id_cliente;
                //$control_nuevo->save(); 
            }
            foreach ($id_empresa as $key => $empresa) {
                    echo "<br>emp:" . $empresa;
                //$control_nuevo = new Control();
                $control_nuevo->id_empresa = $id_empresa;
                    //$control_nuevo->save(); 
            }
            foreach ($num_factura as $key => $num) {
                echo "<br>fact:" . $num;
                //$control_nuevo = new Control();
                $control_nuevo->num_factura = $num_factura;
                //$control_nuevo->save();
                }
            foreach ($monto_cobrado as $key => $mont) {
                echo "<br>monto cobrado:" . $mont;
                //$control_nuevo = new Control();
                $control_nuevo->monto_cobrado = $monto_cobrado;
                //$control_nuevo->save();
            }
            
            foreach ($importe as $key => $import) {
                echo "<br>importe:" . $import;
                $control_nuevo->importe = $importe;
                //$control_nuevo->save();
            }
            foreach ($importe_a_pagar as $key => $importe_a_pag) {
                echo "<br>importe a pagar:" . $importe_a_pag;
                $control_nuevo->importe_a_pagar = $importe_a_pagar;
                //$control_nuevo->save();
            }
            foreach ($nueve_treintayuno as $key => $nueve) {
                echo "<br>F 931:" . $nueve;
                $control_nuevo->nueve_treintayuno = $nueve_treintayuno;
                //$control_nuevo->save();$course = DB::table("your table name")->where("course_code ", "=", $coursecode)->first();
            }
         break;
        }
            $control_nuevo->save(); */
            //$control_nuevo = new Control();
            //$control_nuevo->id_cliente = $cliente;
            //$control_nuevo->id_empresa = $empresa;
            //$control_nuevo->num_factura = $num;
            //echo '<br>';
            //print_r($control_nuevo);
            //break;    
        
        //echo "<br>Solo tienen un dato:";
        //print_r($control_nuevo);
        //$control_nuevo = Control::create(['id_cliente' => $id_cliente, 'id_empresa' => $id_empresa, 'num_factura' => $num_factura]);
        //dd($control_nuevo);
        //$control_nuevo->fecha = $request['fecha'];
        //echo "<br>fecha:" . $request['fecha'];
        //$control_nuevo->quincena_id = $request['quincena_id'];
        //echo "<br>qcna id:" . $request['quincena_id'];
        //$control_nuevo->importe = $request['importe'];
        //echo "<br>importe:" . $request['importe'];
        //$control_nuevo->retencion = $request['retencion'];
        //$control_nuevo->gasto_bancario = $request['gasto_bancario'];
        //$control_nuevo->libre_dispon = $req['importe']-($req['retencion']+ $req['gasto_bancario']);
        //$control_nuevo->pago_personal = $request['pago_personal'];
        //$control_nuevo->pago_transporte = $request['pago_transporte'];
        //$control_nuevo->toneladas = $request['toneladas'];
        //$control_nuevo->observaciones = $request['observaciones'];
        /*$control_nuevo->nueve_treintayuno = $request['nueve_treintayuno'];
        echo "<br>imp. F931:" . $request['nueve_treintayuno'];
        $control_nuevo->pago_personal = $request['pago_personal'];
        echo "<br>pago_personal:" . $request['pago_personal'];
        //$control_nuevo->bines = $request['bines'];
        $control_nuevo->promedio = $request['promedio'];
        //$control_nuevo->diferencia = $request['diferencia'];
        $control_nuevo->importe_a_pagar = $request['importe_a_pagar'];
        echo "<br>importe a pagar:" . $request['importe_a_pagar'];
        $control_nuevo->cantidad_cosecheros = $request['cantidad_cosecheros'];
        echo "<br>cantidad cosecheros:" . $request['cantidad_cosecheros'];
        $control_nuevo->cantidad_jornales = $request['cantidad_jornales'];
        echo "<br>cantidad jornales:" . $request['cantidad_jornales'];
        $control_nuevo->importe_jornales = $request['importe_jornales'];
        echo "<br>importe jornales:" . $request['importe_jornales'];
        $control_nuevo->cantidad_capataces = $request['cantidad_capataces'];
        echo "<br>cantidad capataces:" . $request['cantidad_capataces'];
        $control_nuevo->importe_capataces = $request['importe_capataces'];
        echo "<br>importe capataces:" . $request['importe_capataces'];
        $control_nuevo->cantidad_colectivos = $request['cantidad_colectivos'];
        echo "<br>cantidad colectivos:" . $request['cantidad_colectivos'];
        $control_nuevo->importe_colectivos = $request['importe_colectivos'];
        echo "<br>importe colectivos:" . $request['importe_colectivos'];
        $control_nuevo->cantidad_maletas = $request['cantidad_maletas'];
        echo "<br>cantidad maletas:" . $request['cantidad_maletas'];
        $control_nuevo->cantidad_bines = $request['cantidad_bines'];
        echo "<br>cantidad bines:" . $request['cantidad_bines'];
        $control_nuevo->cantidad_horas = $request['cantidad_horas'];
        echo "<br>cantidad horas:" . $request['cantidad_horas'];
        $control_nuevo->promedio = $request['promedio'];
        echo "<br>promedio:" . $request['promedio'];
        $control_nuevo->observacion = $request['observacion'];
        echo "<br>observaciones:" . $request['observacion'];*/
        /*echo "<br>";
        print_r($control_nuevo);
        dd($control_nuevo);
        $control_nuevo->save();*/

        //print_r($control_nuevo);
        //------------------------------------------------------------------------------------------------

        //$control_nuevo = new Control();
        //$control_nuevo->quincena_id = $req['quincena_id'];
        //$control_nuevo->save();
        //$id_cliente = $req['id_cliente'];
        //$id_empresa = $req['id_empresa'];
        //$num_factura = $req['num_factura'];

        /*for ($i=0; $i<sizeof($id_cliente) ; $i++) { 
            echo "<br>" . $id_cliente;
            //DB::table('controles')->insert($id_cliente, $id_empresa, $num_factura);
            //$client = DB::table('controles')->select('*')->where('id',$id_cliente)->first();
        }
        print_r($id_cliente, $id_empresa, $num_factura);*/

        /*foreach ($req->input('control', []) as $key => $value) {
            dd($req);
            Control::whereKey($key)->update([
            'id_cliente' => $value['id_cliente'],
            'id_empresa' => $value['id_empresa'],
            'num_factura' => $value['area'],
            ]);
            }*/
        //=============================================================================================================================
        /*foreach ($req->all() as $re) {
                $control_nuevo = new Control();
            // 'id_cliente'   => $re['id_cliente'],
            // 'id_empresa'   => $re['id_empresa'],
            // 'num_factura'  => $re['num_factura'],
            $control_nuevo->id_cliente = $re['id_cliente'];
            
            dd($control_nuevo);
        }*/
        //===========================================================================================================================
        /*$datos_grupo = $req->only('id_cliente', 'id_empresa','num_factura');
        foreach ($datos_grupo as $key => $value) {
            $control_nuevo = new Control();
            echo "<br>".join($value);
            $control_nuevo->id_cliente = $value;
            $control_nuevo->id_empresa = $value;
        }
        dd($control_nuevo);*/
        //print_r($value);
        //print_r($valu);
        //dd($datos_grupo);

        //===========LOGRO GRABAR LOS CAMPOS CON FOREACH==============================================================================
        /*$id_cliente = $request['id_cliente'];
        $id_empresa = $request['id_empresa'];
        $num_factura = $request['num_factura'];
        //$control_nuevo = new Control();
        
        for($i = 0; $i<sizeof($request->all()); ++$i);
        {
            $control_nuevo = new Control();
         foreach ($id_cliente as $key=>$value) {
                echo "<br>cliente:" . $value;
                //$control_nuevo = new Control();
                $control_nuevo->id_cliente = $value;
            //$control_nuevo->save();    
        }
            /*foreach ($id_cliente as $key=>$value) {
                echo "<br>cliente:" . $value;
                //$control_nuevo = new Control();
                $control_nuevo->id_cliente = $value;
            //$control_nuevo->save();
            foreach ($id_empresa as $key => $value) {
                echo "<br>empresa:" . $value;
                //$control_nuevo = new Control();
                $control_nuevo->id_empresa = $value;
                //$control_nuevo->save();  
                //print_r($control_nuevo); 
            }
            foreach ($num_factura as
            $key => $value) {
                echo "<br>factura nº:" . $value;
                //$control_nuevo = new Control();
                $control_nuevo->num_factura = $value;
                //$control_nuevo->save();
                //print_r($control_nuevo);
            }
        }
        echo '<br>';
        print_r($control_nuevo);
        dd($control_nuevo);*/

        /* $id_empresa = $req['id_empresa'];
        foreach ($id_empresa as $value) {
            echo "<br>" . $value;
            $control_nuevo = new Control();
            $control_nuevo->id_empresa = $value;
            //$control_nuevo->save();  
            //print_r($control_nuevo); 
        }

        $num_factura = $req['num_factura'];
        foreach ($num_factura as $value) {
            echo "<br>" . $value;
            $control_nuevo = new Control();
            $control_nuevo->num_factura = $value;
            //$control_nuevo->save();
            //print_r($control_nuevo);
        }*/
        //=====================================================================================
        //$control_nuevo->save();

        //print_r($control_nuevo);
                /*$control_nuevo = new Control();

                $control_nuevo->quincena_id = $req['quincena_id'];
                $control_nuevo->id_cliente = $req['id_cliente'];
                $control_nuevo->id_empresa = $req['id_empresa'];
                $control_nuevo->importe = $req['importe'];
                $control_nuevo->retencion = $req['retencion'];
                //'monto_cobrado = $req['monto_cobrado'];
                $control_nuevo->gasto_bancario = $req['gasto_bancario'];
                //$control_nuevo->libre_dispon = $req['importe']-($req['retencion']+ $req['gasto_bancario']);
                $control_nuevo->pago_personal = $req['pago_personal'];
                $control_nuevo->pago_transporte = $req['pago_transporte'];
                $control_nuevo->toneladas = $req['toneladas'];
                $control_nuevo->observaciones = $req['observaciones'];
                $control_nuevo->fecha = $req['fecha'];
                $control_nuevo->nueve_treintayuno = $req['nueve_treintayuno'];
                $control_nuevo->bines = $req['bines'];
                $control_nuevo->promedio = $req['promedio'];
                $control_nuevo->diferencia = $req['diferencia'];
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
                //$control_nuevo->save();*/
                
                   // dd($control_nuevo);
        /*$control_nuevo = array();
        foreach ($request->all() as $req) {
            dd($request);
            $control_nuevo['quincena_id'] = $req->quincena_id;
            $control_nuevo['id_cliente'] = $req['id_cliente'];
            $control_nuevo['id_empresa'] = $req->id_empresa;
            $control_nuevo['importe'] = $req->importe;
            // ... los demás campos
            // timestamp: $cronograma['created_at'] =  now(); <-- Laravel 5.5

            $control_nuevo[] = $control_nuevo;
        }

        Control::insert($control_nuevo);*/

        //print_r($control_nuevo);
        //dd($req->all());
        /*echo "<br>";
        print_r($control_nuevo);*/
        //dd($req->all());

                /*$datos_a_insertar = array();
                $control_nuevo = new Control();
                foreach($control_nuevo as $key => $valor){
                    
                    $datos_a_insertar[$key]['id_cliente'] = $control_nuevo->id_cliente;
                    $datos_a_insertar[$key]['id_empresa'] = $control_nuevo->id_empresa;
                    $datos_a_insertar[$key]['promedio'] = $control_nuevo->promedio;
                }
        print_r($datos_a_insertar);
                //dd($datos_a_insertar);
                //Control::insert($datos_a_insertar);
                //dd($datos_a_insertar);
                print_r($datos_a_insertar);
                //dd($datos_a_insertar);

                DB::table('controles')->insert($datos_a_insertar);
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

        /*Flash::success('Se ha dado de alta el control quincenal de forma exitosa !');
        return redirect('control_quincenal');*/
            
    }

    
    //$control = Control::where('id_factura','=', $id_factura);
    //dd($control);
    //dd($id_factura);
    /*$facturas = Control::where('$id_factura','=', $id_factura);
        $control = Control::all();
        dd($facturas, $control);*/
    public function edit(Request $request)
    {
        $control = Control::where('id_factura', $request->id_factura)->get();
        $clientes = Cliente::all();
        $quincenas= Quincena::all();
        $empresas = Empresa::all();
        
        $vac = compact('control', 'clientes', 'quincenas','empresas');
        //return view('modif_control', $vac)->with($array);
        return view('modif_control', $vac);
        //return view('modif_control')->with("control",$control);
        
    }

    public function detalle(Request $request)
    {
        
        $control = Control::where('id_factura', $request->id_factura)->get();
        $clientes = Cliente::all();
        $quincenas = Quincena::all();
        $empresas = Empresa::all();

        $vac = compact('control', 'clientes', 'quincenas', 'empresas');
        //dd($vac);
        return view('detalle_control', $vac);
        
    }

    public function update(Request $req, $id_factura)
    {
        
        $control = Control::where('id_factura', $req->id_factura)->get();
        $clientes = Cliente::all();
        $quincenas = Quincena::all();
        $fecha_control = Control::select('fecha')->where('id_factura',$req->id_factura)->wherenotNull('fecha')->get();
        
        $fecha1 = $req->fecha;
        
        

        foreach ($fecha_control as $fech) {
            // Obtener la fecha en formato dd-mm-YYYY
            $fecha = $fech->fecha;

            // Convertir la fecha al formato YYYY-mm-dd
            $fecha_convertida = \DateTime::createFromFormat('d-m-Y', $fecha)->format('Y-m-d');

            // Hacer algo con la fecha convertida, como guardarla en la base de datos
        }
        
        if($fecha_convertida < $fecha1){
            $fecha = $fecha1;
        }else{
            $fecha = $fecha_convertida;
        }
        $id_cliente = $req->input('id_cliente');
        $id_empresa = $req->input('id_empresa');
        $num_factura = $req->input('num_factura');
        $monto_cobrado = $req->input('monto_cobrado');
        $importe = $req->input('importe');
        $importe_a_pagar = $req->input('importe_a_pagar');
        $nueve_treintayuno = $req->input('nueve_treintayuno');
        $pago_personal = $req->input('pago_personal');
        $importe_cosecheros = $req->input('importe_cosecheros');
        $cantidad_cosecheros = $req->input('cantidad_cosecheros');
        $cantidad_jornales = $req->input('cantidad_jornales');
        $importe_jornales = $req->input('importe_jornales');
        $cantidad_capataces = $req->input('cantidad_capataces');
        $importe_capataces = $req->input('importe_capataces');
        $cantidad_colectivos = $req->input('cantidad_colectivos');
        $importe_colectivos = $req->input('importe_colectivos');
        $cantidad_maletas = $req->input('cantidad_maletas');
        $cantidad_bines = $req->input('cantidad_bines');
        $cantidad_horas = $req->input('cantidad_horas');
        $promedio = $req->input('promedio');
        $total_liquidacion = $req->input('total_liquidacion');
        $orden_de_pago = $req->input('orden_de_pago');
        $anticipo = $req->input('anticipo');
        $saldo = $req->input('saldo');
        $total_pagado = $req->input('total_pagado');
        $kilos = $req->input('kilos');
        $iva = $req->input('iva');
        $toneladas = $req->input('toneladas');
        $factura = $req->id_factura;
        $observacion = $req->input('observacion');

        //=================================================COMPARO ITEMS VS BASE DE DATOS - INSERTO O MODIFICO==============================================
        $campos_clientes_bd = count(Control::where('id_factura', $req->id_factura)->get()); //cuento los campos en base de datos
        $campo_cliente = count($id_cliente = $req->input('id_cliente'));                    //cuento los inputs en el formulario

        if($campo_cliente > $campos_clientes_bd){
    
        $datos_exist = Control::where('id_factura', $req->id_factura)->whereIn('id_cliente', $req->input('id_cliente'))->get();
        
        foreach ($req->input('id_cliente') as $key => $value) 
        {
            $existente = false;
            foreach ($datos_exist as $dato) {
                if ($dato->id_cliente == $value) {
                    $existente = true;
                    break;
                }
            }
            if (!$existente) 
            {
                $control_nuevo = new Control();
                //$control_nuevo->fecha = $req->input('fecha');
                $control_nuevo->fecha = $fecha;
                $control_nuevo->quincena_id = $req->input('quincena_id');
                $control_nuevo->id_cliente = $id_cliente[$key];
                $control_nuevo->id_empresa = $id_empresa[$key];
                $control_nuevo->num_factura = $num_factura[$key];
                $control_nuevo->importe = $importe[$key];
                $control_nuevo->monto_cobrado = $monto_cobrado[$key];
                $control_nuevo->importe_a_pagar = $importe_a_pagar[$key];
                $control_nuevo->nueve_treintayuno = $nueve_treintayuno[$key];
                $control_nuevo->pago_personal = $pago_personal[$key];
                $control_nuevo->cantidad_cosecheros = $cantidad_cosecheros[$key];
                $control_nuevo->cantidad_jornales = $cantidad_jornales[$key];
                $control_nuevo->importe_jornales = $importe_jornales[$key];
                $control_nuevo->cantidad_capataces = $cantidad_capataces[$key];
                $control_nuevo->importe_capataces = $importe_capataces[$key];
                $control_nuevo->cantidad_colectivos = $cantidad_colectivos[$key];
                $control_nuevo->importe_colectivos = $importe_colectivos[$key];
                $control_nuevo->cantidad_maletas = $cantidad_maletas[$key];
                $control_nuevo->cantidad_bines = $cantidad_bines[$key];
                $control_nuevo->cantidad_horas = $cantidad_horas[$key];
                $control_nuevo->promedio = $promedio[$key];
                $control_nuevo->importe_cosecheros = $importe_cosecheros[$key];
                $control_nuevo->total_liquidacion = $total_liquidacion[$key];
                $control_nuevo->orden_de_pago = $orden_de_pago[$key];
                $control_nuevo->anticipo = $anticipo[$key];
                $control_nuevo->saldo = $saldo[$key];
                $control_nuevo->total_pagado = $total_pagado[$key];
                $control_nuevo->kilos = $kilos[$key];
                $control_nuevo->iva = $iva[$key];
                $control_nuevo->toneladas = $toneladas[$key];
                $control_nuevo->id_factura = $factura;
                $control_nuevo->observacion = $observacion[$key];
                }
            }
                //dd($control_nuevo);
                $control_nuevo->save();
                if ($control_nuevo->save()) {
                    return redirect('resumen_control')->with('msj', 'Se Agrego una factura correctamente', '&nbsp');
                } else {
                    return redirect('resumen_control')->with('errormsj', 'No se guardaron los datos', '&nbsp');
                }
                //dd($control_nuevo);
                //===================================================ACTUALIZA TODOS LOS DATOS DE LA VISTA modif_control================================================
            }else{ 
                                //dd($fecha);

            if (is_iterable($control)) {
                        $count = count($control);
                        for ($i = 0; $i < $count; $i++) {
                            $cont = $control[$i];
                            if (isset($num_factura[$i])) {
                        //$cont->fecha = $req->input('fecha');
                        if ($fecha_convertida < $fecha1) {
                            $cont->fecha = $fecha1;
                        } else {
                            $cont->fecha = $fecha_convertida;
                        }
                                $cont->num_factura = $num_factura[$i];
                                $cont->monto_cobrado = $monto_cobrado[$i];
                                $cont->importe = $importe[$i];
                                $cont->importe_a_pagar = $importe_a_pagar[$i];
                                $cont->nueve_treintayuno = $nueve_treintayuno[$i];
                                $cont->pago_personal = $pago_personal[$i];
                                $cont->importe_cosecheros = $importe_cosecheros[$i];
                                $cont->cantidad_cosecheros = $cantidad_cosecheros[$i];
                                $cont->cantidad_jornales = $cantidad_jornales[$i];
                                $cont->importe_jornales = $importe_jornales[$i];
                                $cont->cantidad_capataces = $cantidad_capataces[$i];
                                $cont->importe_capataces = $importe_capataces[$i];
                                $cont->cantidad_colectivos = $cantidad_colectivos[$i];
                                $cont->importe_colectivos = $importe_colectivos[$i];
                                $cont->cantidad_maletas = $cantidad_maletas[$i];
                                $cont->cantidad_bines = $cantidad_bines[$i];
                                $cont->cantidad_horas = $cantidad_horas[$i];
                                $cont->promedio = $promedio[$i];
                                $cont->total_liquidacion = $total_liquidacion[$i];
                                $cont->orden_de_pago = $orden_de_pago[$i];
                                $cont->anticipo = $anticipo[$i];
                                $cont->saldo = $saldo[$i];
                                $cont->total_pagado = $total_pagado[$i];
                                $cont->kilos = $kilos[$i];
                                $cont->iva = $iva[$i];
                                $cont->toneladas = $toneladas[$i];
                                $cont->observacion = $observacion[$i];
                                //dd($cont);
                            }
                            foreach ($control as $key => $cont) {;
                                if (is_numeric($id_cliente[$key])) {
                                    $cont->id_cliente = $id_cliente[$key];
                                    $cont->save();
                                }
                            }
                            foreach ($control as $key => $cont) {
                                if (is_numeric($id_empresa[$key])) {
                                    $cont->id_empresa = $id_empresa[$key];
                                    $cont->save();
                                }
                            //dd($cont);
                            $cont->save();
                        }
                    }
                $vac = compact('control', 'clientes', 'quincenas');
                if ($cont->save()) {
                    return redirect('resumen_control')->with('msj', 'Datos Modificados Correctamente', '&nbsp');
                } else {
                    return redirect('resumen_control')->with('errormsj', 'No se guardaron los datos', '&nbsp');
                }
                }
            }
        
        
        
      /*$reglas = [
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

        $this->validate($req, $reglas, $mensajes);*/
       
        /*$control->num_factura = $req['num_factura'];
        $control->importe = $req['importe'];
        $control->retencion = $req['retencion'];
        $control->monto_cobrado = $req['monto_cobrado'];
        $control->gasto_bancario = $req['gasto_bancario'];
        //$control->libre_dispon = $req['importe']-($req['retencion']+ $req['gasto_bancario']);
        $control->pago_personal = $req['pago_personal'];
        $control->pago_transporte = $req['pago_transporte'];
        $control->toneladas = $req['toneladas'];
        //$control->observacion = $req['observacion'];
        //grabar
        //$control->quincena_id = $req['quincena_id'];
        //$control->nombre_quincena = $req['quincena_id'];
        
        
        foreach($clientes as $cliente){
            if($req['id_cliente'] == $cliente['nombre'])
            {
                $control->id_cliente = $cliente['id'];
                $control->clientes = $cliente['id'];
            }
        }
        foreach ($quincenas as $quincena) {
            if ($req['quincena_id'] == $quincena['nombre']) {
                $control->quincena_id = $quincena['id'];
                $control->nombre_quincena = $quincena['id'];
            }
        }*/
        //Flash::success('Se ha modificado el control quincenal de forma exitosa !');
        //return redirect('modif_control');          
    }

    public function borrar(Request $form)
    {
        
        $id = $form['id'];
        //$id_factura = $form->id_factura;
        $control = Control::find($id);
        $control->delete();
        //$control = Control::where('id_factura', $req->id_factura)->pluck('id');
        // buscas el hijo y lo borras
        //$factura = Factura::find($control->id_factura);
        //$factura->delete();

        // borrar el padre
        
        //return redirect('/control_quincenal')->with('success', 'User deleted successfully');
        //return view('/cosecha');
        return response()->json(["mensaje" => "borrado"]);
    }

    public function borrar_resumen($id_factura)
    {
        $control = Control::where('id_factura', $id_factura)->first();
        if ($control) {
            $control->delete();
            return response()->json(["mensaje" => "borrado"]);
        } else {
            return response()->json(["error" => "No se encontró la factura"]);
        }
    }

    /*public function borrar_modif(Request $request)
    {
        $id_factura = $request->id_factura;

        $ultimo_registro = DB::table('controles')->where('id_factura', $id_factura)->orderBy('id', 'desc')->first();

        if ($ultimo_registro) {
            DB::table('controles')->where('id', $ultimo_registro->id)->delete();
            return response()->json(["mensaje" => "borrado"]);
        } else {
            return response()->json(["mensaje" => "no se encontraron registros para borrar"]);
        }
    }*/

   /* public function borrarUltimo($form)
    {
        //$ultimo_registro = DB::table('controles')->where('id_factura', $id_factura)->latest()->first();
        $id = $form['id'];

        $object = Control::find($id);
        $object->delete();
        return response()->json(["mensaje" => "borrado"]);
    }*/

    public function resumen(Request $req)
        {
            $controles = Control::all()->groupBy('id_factura');
            $clientes = Cliente::all();
            $quincenas = Quincena::all();
            $empresas = Empresa::all();

            $totalPorFactura = DB::table('controles')
            ->select(
                    'id_factura','fecha','quincena_id','nombre','id_empresa','razon_social',
                    DB::raw('SUM(importe) as total'),
                    DB::raw('SUM(orden_de_pago) as totalordenpago'),
                    DB::raw('SUM(importe_a_pagar) as totalimporteAPagar'),
                    DB::raw('SUM(importe)*0.068 as gastobancario'),
                    DB::raw('SUM(toneladas) as totaltn'),
                    DB::raw('SUM(importe_colectivos) as totalcolectivo')
                    ) ->selectRaw('SUM(importe - orden_de_pago - importe_colectivos - (importe * 0.068)) as totalfactura')
                        ->selectRaw('(SUM(importe - orden_de_pago - importe_colectivos - (importe * 0.068)) / SUM(toneladas)) as promedioPorTonelada')
                        ->join('quincenas', 'controles.quincena_id', '=', 'quincenas.id')
                        ->join('empresas', 'controles.id_empresa', '=', 'empresas.id')
                        ->groupBy('id_factura','fecha','quincena_id','nombre','razon_social')
                        ->orderby('fecha','desc','razon_social','asc')
                        ->get();
                //dd($totalPorFactura);

            $vac = compact('controles','clientes', 'quincenas', 'empresas', 'varcliente', 'varquincena', 'totalPorFactura');
            
            return view('resumen_control', $vac);

        }

    public function verPDF($request)
    {
        //dd($request);
        $control = Control::where('id_factura', $request)->get();
        //$control = Control::all();
        $clientes = Cliente::all();
        $quincenas = Quincena::all();
        $empresas = Empresa::all();

        $vac = compact('control', 'clientes', 'quincenas', 'empresas');
        
        $pdf = PDF::loadView('pdf_detalle_control', compact('control','clientes','quincenas','empresas'));
        $data = ['titulo' => 'Control.net'];
        return $pdf->setPaper('A4', 'landscape')->stream('archivo.pdf');

    }

}
