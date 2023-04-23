@extends('layouts.app1')
<link rel="stylesheet" href="{{ asset('css/responsive.css')}}">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<style>
    /*
        Poner bordes a las tablas. Tomado de:
        https://parzibyte.me/blog/2018/10/16/tabla-html-bordes-css/
    */
    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 0.8px;
    }
</style>
@section('content')
<script src="../js/borrar_control_quincenal.js"></script>
<div class="row" id="contenido">
    <div class="row titulo" id="titulo">
        <h1 class="mt-0 mb-3" style="font-family:Verdana, Geneva, Tahoma, sans-serif">CONTROL QUINCENAL DE FACTURACION Y PAGO</h1>
    </div>

    <!--@include('flash::message')-->
    @if(session()->has('msj'))
    <div class="alert alert-success" role="alert">
        {{ session('msj')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session()->has('errormsj'))
    <div class="alert alert-danger" role="alert">
        {{ session('errormsj')}}
    </div>
    @endif

    <div class="mb-3 navegador" style="margin-left:120px">
        <div class="navegador_control">
            <nav class="navbar navbar-expand navbar-dark indigo mb-1 rounded navegador_control">
                <!-- <div class="row">
                    <p class="text-wrap" style="color:white; position:absolute; z-index:2; margin-left:8rem; margin-top:-2.5rem">INGRESE ClIENTE Y/O QUINCENA</span>
                </div>-->
                <a class="navbar-brand ml-0" href="#">Buscador:</a>


                <form class="form-inline md-form mr-auto mb-4 float-right" action="">
                    <select name="buscarporcliente" class="selectpicker show-menu-arrow">
                        <option>Cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}" @if(old('buscarporcliente'))selected @endif>{{$cliente->nombre}}</option>
                        @endforeach

                    </select>
                    <select name="buscarporquincena" class="selectpicker show-menu-arrow ml-1">
                        <option>Quincena</option>
                        @foreach($quincenas as $quincena)
                        <option value="{{$quincena->id}}" @if(old('buscarporquincena'))selected @endif>{{$quincena->nombre}}</option>
                        @endforeach
                    </select>

                    <button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit"><i class="fas fa-search fa-2x mr-2" style="color:white"></i>Buscar</button>
                    <a href="{{ url('/control_quincenal') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
                    @if(($varcliente||$varquincena)&&($varcliente != 'Cliente' || $varquincena != 'Quincena' ) ) <a class="btn btn-deep-orange" href="/imprimir/{{$varcliente}}/{{$varquincena}}"><i class="fas fa-print fa-2x mr-2" style="color:white"></i>Imprimir Busqueda</a> @endif
                    @if(empty($varcliente)|| empty($varquincena)||($varcliente=='Cliente') && ($varquincena=='Quincena') ) <a class="btn btn-deep-orange btn-rounded btn-sm my-0" href="/imprimir"><i class="fas fa-print fa-2x mr-2" style="color:white"></i>Imprimir reporte</a> @endif
                    <div>
                        @can('agregar_control')
                        <a id="agregar" class="btn blue-gradient btn-rounded btn-sm my-0" href="{{ url('/nuevo_control_factura') }}" role="button" style="color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO </a>
                        <a id="resumen_control" class="btn green-gradient btn-rounded btn-sm my-0" href="{{ url('/resumen_control') }}" role="button" style="color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>VER RESUMEN</a>
                        
                        @endcan
                    </div>


                </form>
            </nav>
        </div>
    </div>

    <div class="row container-fluid">
        {{ $controles->render() }}
    </div>
    <!--Table-->

    <table class="table-bordered table-responsive{-sm|-md|-lg|-xl} table-hover">
        <thead class="text-center">
            <tr width="" style="background-color:black; color:white">
                <th class="col">FECHA</th>
                <th class="col">QUINCENA</th>
                <th class="col">CLIENTE</th>
                <th class="col">EMPRESA FACT.</th>
                <th class="col">Nº FACTURA</th>
                <th class="col">IMPORTE S/IVA</th>
                <th class="col">MONTO COBRADO</th>
                <th class="col">IMPORTE A PAGAR</th>
                <th class="col">IMP. F.931</th>
                <th class="col">TOTAL A PAGAR</th>
                <th class="col">CANT.COS.</th>
                <th class="col">CANT. JORNALES</th>
                <th class="col">IMP. JORNALES</th>
                <th class="col">CANT. CAPATAZ</th>
                <th class="col">IMP. CAPATAZ</th>
                <th class="col">CANT. COLECT.</th>
                <th class="col">IMP. COLECT.</th>
                <th class="col">CANT.MALETAS</th>
                <th class="col">BINES</th>
                <th class="col">CANT.HS.</th>
                <th class="col">PROMEDIO</th>
                <th colspan="2" class="col">ACCION</th>
            </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
            @foreach ($controles as $control)
            <tr>
                <!--<?php $disponible = $control->importe - ($control->retencion + $control->gasto_bancario); ?>
                <?php $totalPago = $control->pago_personal + $control->pago_transporte; ?>-->
                </td>
                <td class="text-center text-truncate"> {{$control->fecha}}</td>
                <td class="text-center text-truncate"> {{$control->quincena->nombre}}</td>
                <td class="text-center text-truncate"> {{$control->cliente->nombre}}</td>
                <td class="text-center text-truncate"> {{$control->empresa->razon_social}}</td>
                <td class="text-center text-truncate"> {{$control->num_factura}}</td>
                <td class="text-center text-truncate"> {{$control->importe}}</td>
                <td class="text-center text-truncate"> {{$control->monto_cobrado}}</td>
                <td class="text-center text-truncate"> {{$control->importe_a_pagar}}</td>
                <td class="text-center text-truncate"> {{$control->nueve_treintayuno}}</td>
                <td class="text-center text-truncate"> {{$control->pago_personal}}</td>
                <td class="text-center text-truncate"> {{$control->cantidad_cosecheros}}</td>
                <td class="text-center text-truncate"> {{$control->cantidad_jornales}}</td>
                <td class="text-center text-truncate"> {{$control->importe_jornales}}</td>
                <td class="text-center text-truncate"> {{$control->cantidad_capataces}}</td>
                <td class="text-center text-truncate"> {{$control->importe_capataces}}</td>
                <td class="text-center text-truncate"> {{$control->cantidad_colectivos}}</td>
                <td class="text-center text-truncate"> {{$control->importe_colectivos}}</td>
                <!--<td class="text-center text-truncate"> {{$totalPago}}</td>-->
                <!--<td class="text-center text-truncate">$ {{$disponible - $totalPago}}</td>-->
                <td class="text-center text-truncate"> {{$control->cantidad_maletas}}</td>
                <td class="text-center text-truncate"> {{$control->cantidad_bines}}</td>
                <td class="text-center text-truncate"> {{$control->cantidad_horas}}</td>
                <td class="text-center text-truncate"> {{$control->promedio}}</td>

                @can('borrar_control')
                <td class="text-center">
                    <!--<i type="button" onclick="return borrar(this)" value="{{$control->id}}" id="borra" title="Borra Factura" name="borra" class="fas fa-trash mr-2" style="color:red" role="button"></i>-->
                    <button type="button" onclick="return borrar(this)" value="{{$control->id}}" id="borra" title="Borra Factura" name="borra" class="btn-xs btn-danger" role="button" aria-pressed="true"><i class="fas fa-trash-alt" style="color:white"></i></button>
                    @endcan

                    <!--<i id="modificar" class="fas fa-eye mr-2" method="PUT" action="/modal_control/{{ $control->id }}" style="color:blue; cursor:pointer" title="Ver" type="button" href="/modal_control/{{ $control->id }}" data-toggle="modal" data-target="#modal_control{{ $control->id }}" form method="POST" action="/modal_control/{{$control->id_factura}}" role="button"></i>-->
                    @if(is_null($control->id_factura))
                    <a id="modificar" href="/../modif_control/{{ $control->id_factura }}"></a>
                    @else
                    <a id="modificar" class="fas fa-eye mr-2" href="/../modif_control/{{ $control->id_factura }}"></a>
                    @endif

                    @csrf
                    {{method_field('PUT')}}

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $controles->appends($_GET)->links() }}

</div>
</div>

<!--Section: Content-->

@endsection