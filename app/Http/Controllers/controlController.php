<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Control;
use App\Quincena;
use App\Cliente;
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
            $controles = Control::orderBy('quincena_id', 'asc')
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
                $controles = Control::orderBy('quincena_id', 'asc')
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
        $controles = Control::all()->sortBy('quincena');
        

        // dd($productos);
        $vac = compact('controles');
        return view("control_quincenal", $vac);
    }
  
    public function agregar(Request $req){
        $controles = Control::all();
        $clientes = Cliente::all();
        $quincenas = Quincena::all();

        
        $vac = compact('controles', 'clientes', 'quincenas');
        
       return view('nuevo_control', $vac);
   }

    public function agregar_control(Request $req)
    {
 
        $reglas = [
            'quincena_id' => 'required',
            'id_cliente' => 'required',
            'num_factura' => 'numeric|min:000000000|max:99999999999',
            'importe' => 'numeric|min:0000000000.00|max:9999999999.99',
            'retencion' => 'numeric|min:0000000|max:9999999999',
            'monto_cobrado' => 'numeric|min:0000000|max:9999999999',
            'gasto_bancario' => 'numeric|min:0000000|max:9999999999',
            'pago_personal' => 'numeric|min:0000000|max:9999999999',
            'pago_transporte' => 'numeric|min:0000000|max:9999999999',
            'toneladas' => 'numeric|min:0000000|max:9999999999',
            
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

        $this->validate($req, $reglas, $mensajes);

        $control_nuevo = new Control();
        
        $control_nuevo->quincena_id = $req['quincena_id'];
      //  $control_nuevo->nombre_quincena = $req['quincena_id'];
        $control_nuevo->id_cliente = $req['id_cliente'];
        $control_nuevo->num_factura = $req['num_factura'];
        $control_nuevo->importe = $req['importe'];
        $control_nuevo->retencion = $req['retencion'];
        $control_nuevo->monto_cobrado = $req['monto_cobrado'];
        $control_nuevo->gasto_bancario = $req['gasto_bancario'];
        $control_nuevo->libre_dispon = $req['importe']-($req['retencion']+ $req['gasto_bancario']);
        $control_nuevo->pago_personal = $req['pago_personal'];
        $control_nuevo->pago_transporte = $req['pago_transporte'];
        $control_nuevo->toneladas = $req['toneladas'];
        $control_nuevo->observacion = $req['observacion'];
        //grabar

        //dd($control_nuevo);
        $control_nuevo->save();

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
        $controles = Control::all();

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
