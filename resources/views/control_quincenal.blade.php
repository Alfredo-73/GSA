@extends('layouts.app1')
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
<script src="../js/borrar_control_quincenal.js"></script>
<link rel="stylesheet" href="{{ asset('css/estilos_control.css')}}">

@section('content')
<div class="row container-fluid col-md-8 col-lg-8" id="contenido">

    <div class="container-fluid mx-auto text-center" id="titulo">
        <h1 class="mx-auto mt-5 mb-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">CONTROL QUINCENAL </h1>
        <h1 class="mx-auto mt-5 mb-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">DE FACTURACION Y PAGO</h1>

        @can('agregar_control')
        <a id="agregar" class="btn primary-color-dark mb-2 rounded" href="{{ url('/nuevo_control') }}" role="button" style="margin-left:52rem;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO </a>
        @endcan
    </div>
    
    <div class="container-fluid text-nowrap mb-5">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark indigo mb-2 rounded">
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
                    <select name="buscarporquincena" class="selectpicker show-menu-arrow">
                        <option>Quincena</option>
                        @foreach($quincenas as $quincena)
                        <option value="{{$quincena->id}}" @if(old('buscarporquincena'))selected @endif>{{$quincena->nombre}}</option>
                        @endforeach
                    </select>

                    <button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit"><i class="fas fa-search fa-2x mr-2" style="color:white"></i>Buscar</button>
                    <a href="{{ url('/control_quincenal') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
                    @if(($varcliente||$varquincena)&&($varcliente != 'Cliente' || $varquincena != 'Quincena' ) ) <a class="btn btn-deep-orange" href="/imprimir/{{$varcliente}}/{{$varquincena}}"><i class="fas fa-print fa-2x mr-2" style="color:white"></i>Imprimir Busqueda</a> @endif
                    @if(empty($varcliente)|| empty($varquincena)||($varcliente=='Cliente') && ($varquincena=='Quincena') ) <a class="btn btn-deep-orange btn-rounded btn-sm my-0" href="/imprimir"><i class="fas fa-print fa-2x mr-2" style="color:white"></i>Imprimir reporte</a> @endif

                </form>
            </nav>
        </div>
    </div>

    <div class="row container-fluid">

    {{ $controles->render() }}
    </div>
    <!--Table-->
    <div class="container-fluid">
        <div class="table-responsive-lg text-nowrap btn-table">
            <table class="table-bordered table-hover">
                <thead class="thead-dark">
                    <thead class="text-center">
                        <tr height="65px" style="background-color:black; color:white">
                            <th class="text-center text-truncate">CLIENTE</th>
                            <th class="text-center text-truncate">QUINCENA</th>
                            <th class="text-center text-truncate">Nº FACTURA</th>
                            <th class="text-center text-truncate">IMPORTE</th>
                            <th class="text-center text-truncate">MONTO COBRADO</th>
                            <th class="text-center text-truncate">GASTOS BANCARIOS</th>
                            <th class="text-center text-truncate">DISPONIBLE</th>
                            <th class="text-center text-truncate">TOTAL PAGO</th>
                            <th class="text-center text-truncate">NETO QCNA</th>
                            <th class="text-center text-truncate">COSTO Tn</th>
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

                        <td class="text-center text-truncate"> {{$control->cliente->nombre}}</td>
                        <td class="text-center text-truncate"> {{$control->quincena->nombre}}</td>
                        <td class="text-center text-truncate"> {{$control->num_factura}}</td>
                        <td class="text-center text-truncate">$ {{$control->importe}}</td>
                        <td class="text-center text-truncate">$ {{$control->monto_cobrado}}</td>
                        <td class="text-center text-truncate">$ {{$control->gasto_bancario}}</td>
                        <td class="text-center text-truncate">$ {{$disponible}}</td>
                        <td class="text-center text-truncate">$ {{$totalPago}}</td>
                        <td class="text-center text-truncate">$ {{$disponible - $totalPago}}</td>
                        <td class="text-center text-truncate">$ {{round((($disponible - $totalPago)/$control->toneladas),2)}}</td>
                        @can('borrar_control')
                        <td class="text-center">
                            <button type="" onclick="return borrar(this)" value="{{$control->id}}" id="borrar" name="borrar" class="btn peach-gradient mb-1 btn-sm m-0 text-center text-truncate"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR</button>

                        </td>
                        @endcan
                        <td >
                            <form method="PUT" action="/modal_control/{{ $control->id }}">
                                @csrf
                                {{method_field('PUT')}}
                                <a type="button" href="/modal_control/{{ $control->id }}" class="btn blue-gradient mb-1 btn-sm m-0 text-center text-truncate" data-toggle="modal" data-target="#modal_control{{ $control->id }}" form method="POST" action="/modal_control/{{$control->id}}" role="button" style="text-align:justify"><i class="fas fa-eye mr-1" style="color:white"></i>VER</a>
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