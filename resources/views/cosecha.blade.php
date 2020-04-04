@extends('layouts.app1')
@section('content')
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
<script src="../js/borrar.js"></script>
<link rel="stylesheet" href="{{ asset('css/estilos.css')}}">

<div class="container-fluid col-md-8 col-lg-8">

    <div class="text-center" id="contenido">
        <h1 class="mx-auto mt-5 mb-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">PARTE DIARIO DE COSECHA</h1>
        @can('agregar_cosecha')
        @endcan
    </div>
    <a id="agregar" class="btn primary-color-dark mb-2 rounded" href="{{ url('/nueva_cosecha') }}" role="button" style="margin-left:52rem;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO </a>

    <div class="container-fluid">
        <nav class="navbar  navbar-dark indigo rounded mb-2 px-5 ml-5 mb-3">
            <span style="font-size:15px; font-family:Verdana, Geneva, Tahoma, sans-serif" class="text-white ml-5">INGRESE RANGO DE FECHA Y/O CAPATAZ:</span>
            <form class="form-inline">
                <input class="md-form mr-2 text-center rounded" type="date" placeholder="Desde" aria-label="Search" name="fechadesde" role="button">
                <input class="md-form mr-2 text-center rounded" type="date" placeholder="Hasta" aria-label="Search" name="fechahasta" role="button">
                <select class="selectpicker show-menu-arrow" name="buscacapataz" value="">
                    <option>Capataz</option>
                    @foreach($capataz as $capat)
                    <option value="{{$capat->id}}">{{$capat->nombre}}</option>
                    @endforeach
                </select>
                <button class="btn blue-gradient btn-rounded btn-sm my-0"><i class="fas fa-search fa-2x mr-2" style="color:white" name="buscar"></i>Buscar</button>

                <a href="{{ url('/cosecha') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
                @if(($varfechadesde || $varfechahasta) || ($varbuscacapataz) && ($varbuscacapataz !='Capataz'))<a role="button" class="btn btn-deep-orange" href="verreportecosechaPDF/{{$varfechadesde}}/{{$varfechahasta}}/{{$varbuscacapataz}}"><i class="fas fa-print mr-2" style="color:white"></i>Imprimir Busqueda</a> @endif
                @if((empty($varfechadesde) && empty($varfechahasta) || ($varbuscacapataz=='Capataz')) && (($varbuscacapataz =='Capataz') && ($varfechadesde ==null) && ($varfechahasta==null)))<a role="button" class="btn btn-deep-orange" href="verreportecosechaPDF"><i class="fas fa-print mr-2" style="color:white"></i>Imprimir Reporte</a> @endif
            </form>
        </nav>
    </div>

    {{ $cosechas->appends($_GET)->links() }}
    <!--Table-->
    <div class="table table-md">
        <div class="table-wrapper">
            <table class="table-bordered table-hover mx-auto">
                <thead class="thead-dark">
                    <thead class="text-center">
                        <tr height="60px" style="background-color:black; color:white">
                            <th class="text-center text-truncate">FECHA</th>
                            <th class="text-center text-truncate">CLIENTE</th>
                            <th class="text-center text-truncate">CAPATAZ</th>
                            <th class="text-center text-truncate">JORNALES</th>
                            <th class="text-center text-truncate">COSECHEROS</th>
                            <th class="text-center text-truncate">BINES</th>
                            <th class="text-center text-truncate">MALETAS</th>
                            <th class="text-center text-truncate">TONELADAS</th>
                            <th class="text-center text-truncate">PROM.KG/BIN</th>
                            <th class="text-center text-truncate">SUPERVISOR</th>
                            <th COLSPAN=2 class="text-center">ACCIONES DISPONIBLES</th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                <tbody>
                    @foreach ($cosechas as $cosecha)
                    <tr>
                        <td class="text-center text-truncate" name="fecha"> {{$cosecha->fecha}}</td>
                        <td class="text-center text-truncate"> {{$cosecha->cliente->nombre}}</td>
                        <td class="text-center text-truncate"> {{$cosecha->capataz->nombre}}</td>
                        <td class="text-center text-truncate"> {{$cosecha->jornales}}</td>
                        <td class="text-center text-truncate"> {{$cosecha->cosecheros}}</td>
                        <td class="text-center text-truncate"> {{$cosecha->bines}}</td>
                        <td class="text-center text-truncate"> {{$cosecha->maletas}}</td>
                        <td class="text-center text-truncate"> {{$cosecha->toneladas}}</td>
                        <td class="text-center text-truncate"> {{$cosecha->prom_kg_bin}}</td>
                        <td class="text-center text-truncate"> {{$cosecha->supervisor}}</td>
                        @can('borrar_cosecha')
                        <td class="text-center">
                            <button type="" onclick="return borrar(this)" value="{{$cosecha->id}}" id="borrar" name="borrar" class="btn peach-gradient mb-1 btn-sm m-0 text-center text-truncate"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR</button>
                        </td>
                        @endcan
                        <td>
                            <form method="PUT" action="/modalcosecha/{{$cosecha->id}}">
                                @csrf
                                {{method_field('PUT')}}
                                <a type="button" class="btn blue-gradient mb-1 btn-sm m-0 text-center text-truncate" href="/modalcosecha/{{ $cosecha->id }}" data-toggle="modal" data-target="#modalcosecha{{ $cosecha->id }}" form method="POST" action="/modalcosecha/{{$cosecha->id}}" role="button" style="text-align:justify"><i class="fas fa-eye mr-1" style="color:white"></i>VER</a>
                                @csrf
                                {{method_field('PUT')}}
                                @include('modalcosecha')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!--Table body-->
            </table>
            <!--{{ $cosechas->render() }}-->
        </div>
        {{ $cosechas->appends($_GET)->links() }}
        <!--Table-->
    </div>
</div>
{{ $cosechas->appends($_GET)->links() }}
<!--Table-->

<!--Section: Content-->

@endsection