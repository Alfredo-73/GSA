@extends('layouts.app1')
<link rel="stylesheet" href="{{ asset('css/responsive.css')}}">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../js/borrar_control_quincenal.js"></script>
@section('content')
<div class="row col-md-10 col-lg-10" id="contenido">
    <div class="row titulo" id="titulo">
        <h1 class="mt-5 mb-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">CONTROL QUINCENAL DE FACTURACION Y PAGO</h1>
    </div>
    @include('flash::message')
    <div class="mb-5 navegador">
        <div class="navegador_control">
            <nav class="navbar navbar-expand navbar-dark indigo mb-2 rounded navegador_control">
                <!-- <div class="row">
                    <p class="text-wrap" style="color:white; position:absolute; z-index:2; margin-left:8rem; margin-top:-2.5rem">INGRESE ClIENTE Y/O QUINCENA</span>
                </div>-->
                <a class="navbar-brand ml-3" href="#">Buscador:</a>


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
                        @endcan
                    </div>

                    <a id="agregar_control_factura" class="btn green-gradient btn-rounded btn-sm my-0" href="{{ url('/nuevo_control_factura') }}" role="button" style="color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO C/Fact. </a>
                </form>
            </nav>
        </div>
    </div>

    <div class="row container-fluid">
        {{ $controles->render() }}
    </div>
    <!--Table-->
    <table class="table table-sm table-bordered table-responsive-sm table-hover tabla">
        <thead class="text-center">
            <tr height="65px" style="background-color:black; color:white">
                <th class="text-center">FECHA</th>
                <th class="text-center">CLIENTE</th>
                <th class="text-center">QUINCENA</th>
                <th class="text-center">Nº FACTURA</th>
                <th class="text-center">IMPORTE S/IVA</th>
                <th class="text-center">MONTO COBRADO</th>
                <th class="text-center">GASTOS BANCARIOS</th>
                <th class="text-center">DISPONIBLE</th>
                <th class="text-center">TOTAL PAGO</th>
                <th class="text-center">NETO QCNA</th>
                <th class="text-center">BINES</th>
                <th class="text-center">PROMEDIO KG</th>
                <th class="text-center text-truncate">DIFERENCIA KG</th>
                <th class="text-center">COSTO Tn</th>
                <th colspan=2 class="text-center">ACCION</th>
            </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>

            @foreach ($controles as $control)
            <tr>
                <?php $disponible = $control->importe - ($control->retencion + $control->gasto_bancario); ?>
                <?php $totalPago = $control->pago_personal + $control->pago_transporte; ?>

                <td class="text-center text-truncate"> {{$control->fecha}}</td>
                <td class="text-center text-truncate"> {{$control->cliente->nombre}}</td>
                <td class="text-center text-truncate"> {{$control->quincena->nombre}}</td>
                <td class="text-center text-truncate"> {{$control->num_factura}}</td>
                <td class="text-center text-truncate">$ {{$control->importe}}</td>
                <td class="text-center text-truncate">$ {{$control->monto_cobrado}}</td>
                <td class="text-center text-truncate">$ {{$control->gasto_bancario}}</td>
                <td class="text-center text-truncate">$ {{$disponible}}</td>
                <td class="text-center text-truncate">$ {{$totalPago}}</td>
                <td class="text-center text-truncate">$ {{$disponible - $totalPago}}</td>

                <td class="text-center text-truncate"> {{$control->bines}}</td>
                <td class="text-center text-truncate"> {{$control->promedio}}</td>
                <td class="text-center text-truncate"> {{$control->diferencia}}</td>
                <td class="text-center text-truncate"></td>
                
                @can('borrar_control')
                <td class="borrar">
                    <!--<button type=" button" class="btn btn-danger btn-sm" onclick="return borrar(this)" value="{{$control->id}}" id="borrar" name="borrar" style=" font-size:70%">Borrar</button>-->
                    <a type="button" class="borrar" onclick="return borrar(this)" value="{{$control->id}}" id="borrar" name="borrar"">BORRAR</a>
                    <!--<button type="" onclick=" return borrar(this)" value="{{$control->id}}" id="borrar" name="borrar" class="btn peach-gradient mb-1 btn-sm m-0 text-center text-truncate"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR</button>-->
                </td>
                @endcan

                <td class="ver">
                    <form method=" PUT" action="/modal_control/{{ $control->id }}">
                        @csrf
                        {{method_field('PUT')}}
                        <a type="button" class="ver" href="/modal_control/{{ $control->id }}" data-toggle="modal" data-target="#modal_control{{ $control->id }}" form method="POST" action="/modal_control/{{$control->id}}" id="ver" name="ver">Ver</a>
                        <!-- <button type="button" href="/modal_control/{{ $control->id }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_control{{ $control->id }}" form method="POST" action="/modal_control/{{$control->id}}" role="button" style="text-align:justify; font-size:70%">Ver</button>-->
                        @csrf
                        {{method_field('PUT')}}
                        @include('modal_control')
                    </form>
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