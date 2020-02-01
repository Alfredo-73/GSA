<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cosecha;
use App\Capataz;
use App\Cliente;
use PDF;
use Laracasts\Flash\Flash;
use dateTranslator;
use DB;


class cosechaController extends Controller
{
    public function index(Request $request){
            
    $fechadesde=trim($request->get('fechadesde'));
    $fechahasta=trim($request->get('fechahasta'));
    $buscacapataz=trim($request->get('buscacapataz'));

    $varfechadesde = $fechadesde;
    $varfechahasta = $fechahasta;
    $varbuscacapataz = $buscacapataz;
        
    if(empty($fechadesde && $fechahasta)){
        $cosechas = Cosecha::orderBy('fecha', 'desc')->Paginate(10);
        //$cosechas=Cosecha::where('fecha','like',"%$fechadesde%")->orderBy('fecha', 'desc')->paginate(10);
                $clientes = Cliente::all();
                $capataz = Capataz::all()->sortBy('nombre');
                $vac = compact('cosechas', 'clientes', 'capataz', 'varfechadesde', 'varfechahasta', 'varbuscacapataz');
                return view("cosecha", $vac);
                    }else if ($buscacapataz == 'Capataz'){
                        $cosechas = Cosecha::whereBetween('fecha',[$fechadesde, $fechahasta])
                        ->orderBy('fecha', 'desc',)->Paginate(10);
                        $clientes = Cliente::all();
                        $capataz = Capataz::all();
                        $vac = compact('cosechas', 'clientes', 'capataz', 'varfechadesde', 'varfechahasta', 'varbuscacapataz');
                        return view('cosecha', $vac);
                            }else{
                                $cosechas = Cosecha::where('id_capataz', 'like', "%$buscacapataz%")
                                ->whereBetween('fecha',[$fechadesde, $fechahasta])
                                ->orderBy('fecha', 'desc',)->Paginate(10);
                                $clientes = Cliente::all();
                                $capataz = Capataz::all()->where('id','like',"%$buscacapataz%");
                                $vac = compact('cosechas', 'clientes', 'capataz', 'varfechadesde', 'varfechahasta', 'varbuscacapataz');
                                return view('cosecha', $vac);
                            }        
    }

    public function listado(Request $req)
    {
        //$cosechas = Cosecha::orderBy('fecha','desc')->paginate(10);
        //$clientes = Cliente::all();
        //$capataz = Capataz::all();

        // dd($cosechas);
        //$vac = compact('cosechas', 'clientes', 'capataz');
        //return view("cosecha", $vac);
    }

    public function agregar(Request $req){
        $clientes = Cliente::all();
        $capataz = Capataz::all()->sortBy('nombre');

        $vac = compact('capataz', 'clientes');
       return view('nueva_cosecha', $vac);
   }

    public function agregar_cosecha(Request $req)
    {
        $reglas = [
           // 'id_cliente' => 'numeric|max:10',
            'fecha' => 'date',
           // 'id_capataz' => 'numeric|max:10',

            'jornales' => 'numeric|min:00001|max:99999',
            'cosecheros' => 'numeric|min:0000|max:999999',
            'bines' => 'numeric|min:0000|max:999999999',
            'maletas' => 'numeric|min:0000|max:9999999999',
            'toneladas' => 'numeric|min:0000000|max:9999999999',
            'prom_kg_bin' => 'numeric|min:0000000|max:9999999999',
            'supervisor' => 'string|min:0|max:255',
            
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

        $cosecha_nueva = new Cosecha();
        
        $cosecha_nueva->id_cliente = $req['id_cliente'];
        $cosecha_nueva->fecha = $req['fecha'];
        $cosecha_nueva->id_capataz = $req['capataz'];
        $cosecha_nueva->jornales = $req['jornales'];
        $cosecha_nueva->cosecheros = $req['cosecheros'];
        $cosecha_nueva->bines = $req['bines'];
        $cosecha_nueva->maletas = $req['maletas'];
        $cosecha_nueva->prom_kg_bin = $req['prom_kg_bin'];
        $cosecha_nueva->toneladas = $req['toneladas'];
        $cosecha_nueva->supervisor = $req['supervisor'];
        //grabar
        $cosecha_nueva->save();


        Flash::success('Se ha dado de alta la cosecha de ' . $cosecha_nueva->fecha . ' de forma exitosa !');



        return redirect('cosecha');
    }

    public function edit($id)
    {

        $cosecha = cosecha::Find($id);
        $clientes = Cliente::all();
         $capataz = Capataz::all();

        $vac = compact('cosecha', 'clientes', 'capataz');

        return view('modif_cosecha', $vac);
        
    }
    public function update(Request $req,$id)
    {
        $cosecha = cosecha::Find($id);
        $reglas = [
            //'id_cliente' => 'numeric|max:10',
            'fecha' => 'date',
            //'id_capataz' => 'numeric|max:10',

            'jornales' => 'numeric|min:0000|max:99999',
            'cosecheros' => 'numeric|min:0000|max:9999999',
            'bines' => 'numeric|min:0000|max:9999999999',
            'maletas' => 'numeric|min:0000|max:9999999999',
            'toneladas' => 'numeric|min:0000000|max:9999999999',
            'prom_kg_bin' => 'numeric|min:0000000|max:99999999999',
            'supervisor' => 'string|min:0|max:255',
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
    
        //dd($cosecha);
        $this->validate($req, $reglas, $mensajes);
        $cosecha->id_cliente = $req['id_cliente'];
        $cosecha->fecha = $req['fecha'];
        $cosecha->id_capataz = $req['id_capataz'];
        $cosecha->jornales = $req['jornales'];
        $cosecha->cosecheros = $req['cosecheros'];
        $cosecha->bines = $req['bines'];
        $cosecha->maletas = $req['maletas'];
        $cosecha->prom_kg_bin = $req['prom_kg_bin'];
        $cosecha->toneladas = $req['toneladas'];
        $cosecha->supervisor = $req['supervisor'];
        //grabar
        
        $cosecha->save();
        Flash::success('Se ha modificado la cosecha de ' . $cosecha->fecha . ' de forma exitosa !');

        return redirect('cosecha');
            
    }


    public function borrar(Request $form)
    //public function borrar($id)
    {
        $id = $form['id'];

        $cosecha = cosecha::find($id);
        $cosecha->delete();
        Flash::success('Se ha borrado la cosecha de ' . $cosecha->fecha . ' de forma exitosa !');

        
        return redirect('/cosecha');
    }

    //pdf
    //para verlo este usamos
    public function vercosechaPDF($id)
    {
        $cosecha = Cosecha::find($id);
        $pdf = PDF::loadView('pdf_cosecha', compact('cosecha'));

        $data = [
            'titulo' => 'Cosecha.net'
        ];

        return $pdf->setPaper('a4', 'portrait')
            ->stream('parte_diario.pdf');
    }

    public function verreportecosechaPDF($varfechadesde, $varfechahasta, $varbuscacapataz)
    {
        if($varfechadesde !== null && $varfechahasta !== null && $varbuscacapataz !== 'Capataz'){
            $cosechas = Cosecha::where('id_capataz', 'like', "%$varbuscacapataz%")
            ->whereBetween('fecha',[$varfechadesde, $varfechahasta])
            ->orderBy('fecha', 'desc')->paginate();//DEJAR PAGINATE(), SI NO TIENE EL PDF NO MUESTRA DATOS
            //$cosechas=Cosecha::where('fecha','like',"%$fechadesde%")->orderBy('fecha', 'desc')->paginate(10);
            $clientes = Cliente::all();
            $capataz = Capataz::all()->sortBy('nombre');
            $vac = compact('cosechas', 'clientes', 'capataz');
            $pdf = PDF::loadView('pdf_reporte_cosecha', compact('cosechas'));
            
            $data = [
                'titulo' => 'Cosecha.net'
            ];
            
            return $pdf->setPaper('a4', 'portrait')
            ->stream($varfechadesde.'_'.$varfechahasta.'_'.$varbuscacapataz.'consulta_parte_diario.pdf');
            
        }else if(($varfechadesde !==null && $varfechahasta !==null) && ($varbuscacapataz == 'Capataz')){
                        $cosechas = Cosecha::whereBetween('fecha',[$varfechadesde, $varfechahasta])
                        ->orderBy('fecha', 'desc',)->paginate();//DEJAR PAGINATE(), SI NO TIENE EL PDF NO MUESTRA DATOS
                        $clientes = Cliente::all();
                        $capataz = Capataz::all();
                        $vac = compact('cosechas', 'clientes', 'capataz');
            $pdf = PDF::loadView('pdf_reporte_cosecha', compact('cosechas'));

            $data = [
                'titulo' => 'Cosecha.net'
            ];

            return $pdf->setPaper('a4', 'portrait')
                ->stream($varfechadesde.'_'.$varfechahasta.'_'.$varbuscacapataz.'consulta_parte_diario.pdf');

            // return $pdf->download('control.pdf')

        //para verlo
        }
    }

    public function verreportecosechaPDF($cosechas, $clientes, $capataz)
    {
        //$fechadesde = trim($request->get('fechadesde'));
        dd($cosechas);
        //$fechahasta = trim($request->get('fechahasta'));
        //$buscacapataz = trim($request->get('buscacapataz'));

        
            $cosechas = Cosecha::where('id_capataz', 'like', "%$buscacapataz%")
            ->whereBetween('fecha', [$fechadesde, $fechahasta])
            ->orderBy('fecha', 'desc',);
            $clientes = Cliente::all();
            $capataz = Capataz::all()->where('id', 'like', "%$buscacapataz%");
            $vac = compact('cosechas', 'clientes', 'capataz');
            //dd($vac);
            $pdf = PDF::loadView('pdf_cosecha', compact('cosechas', 'clientes', 'capataz'));

            $data = [
                'titulo' => 'Cosecha.net'
            ];

            return $pdf->setPaper('a4', 'portrait')
                ->stream('consulta_parte_diario.pdf');

            // return $pdf->download('control.pdf')

        //para verlo
    }
}
