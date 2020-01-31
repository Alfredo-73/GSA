@extends('layouts.app')

@section('content')
@section('scripts')
<script>

</script>
@endsection

<?php

$enviado = false;
$fechadesde = null;
$fechahasta = null;
$buscacapataz = null;

if (isset($_GET["buscar"])) {
    $enviado = true;

    $fechadesde = $_GET["fechadesde"];
    $fechahasta = $_GET["fechahasta"];
    $buscacapataz = $_GET["buscacapataz"];
}

?>

<div class="row justify">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="mx-auto">
            <div class="px-2">
                <div class="table-wrapper">
                    <h1 class="text-center" style="font-family:Verdana, Geneva, Tahoma, sans-serif">PARTE DIARIO DE COSECHA</h1>
                    <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nueva_cosecha') }}" role="button" style="margin-left:75rem; color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO</a>
                </div>
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-dark indigo mb-4 rounded">
                        <div class="row">
                            <p class="text-wrap" style="color:white; position:absolute; z-index:2; margin-left:8rem; margin-top:-2.5rem">INGRESE RANGO DE FECHA Y/O CAPATAZ</span>
                        </div>
                        <a class="navbar-brand ml-3" href="#">Buscador:</a>
                        <form class="form-inline">
                            <input class="md-form mr-2 text-center rounded" type="date" placeholder="Desde" aria-label="Search" name="fechadesde" role="button" value="">
                            <input class="md-form mr-2 text-center rounded" type="date" placeholder="Hasta" aria-label="Search" name="fechahasta" role="button" value="">
                            <select class="selectpicker show-menu-arrow" name="buscacapataz" value="<?php echo $buscacapataz; ?>">
                                <option>Capataz</option>
                                @foreach($capataz as $capat)
                                <option value="{{$capat->id}}">{{$capat->nombre}}</option>
                                @endforeach
                            </select>
                            <button class="btn blue-gradient btn-rounded btn-sm my-0"><i class="fas fa-search fa-2x mr-2" style="color:white" name="buscar"></i>Buscar</button>

                            <a role="button" href="{{ url('/cosecha') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
                        </form>
                    </nav>
                </div>

                {{ $cosechas->render() }}
                <!--Table-->
                <!--<table class="table-striped w-auto">-->
                <table class="table table-bordered table-hover">

                    <!--Table head-->
                    <thead class="thead-dark">
                        <tr>
                            <!--<th>
                                        <input class="form-check-input" type="checkbox" id="checkbox">
                                        <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
                                    </th>-->
                            <th class="th-lg text-center">
                                <a>FECHA
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center" hidden="true">
                                <a>CLIENTE
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>CAPATAZ
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>JORNALES
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>COSECHEROS
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>BINES
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>MALETAS
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>TONELADAS
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>PROM. KG/BIN
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>

                            <th class="th-lg text-center" hidden="true">
                                <a>SUPERVISOR
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th COLSPAN=2 class="text-center">ACCION</th>
                        </tr>

                        </<thead>
                        <!--Table head-->

                        <!--Table body-->
                    <tbody>
                        @foreach ($cosechas as $cosecha)
                        <tr>
                            <!--<th scope="row">
                                        <input class="form-check-input" type="checkbox" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1" class="label-table"></label>
                                    </th>-->
                            <td class="text-center" name="fecha"> {{$cosecha->fecha}}</td>
                            <td class="text-center" hidden="true"> {{$cosecha->cliente->nombre}}</td>
                            <td class="text-center"> {{$cosecha->capataz->nombre}}</td>
                            <td class="text-center"> {{$cosecha->jornales}}</td>
                            <td class="text-center"> {{$cosecha->cosecheros}}</td>
                            <td class="text-center"> {{$cosecha->bines}}</td>
                            <td class="text-center"> {{$cosecha->maletas}}</td>
                            <td class="text-center"> {{$cosecha->toneladas}}</td>
                            <td class="text-center"> {{$cosecha->prom_kg_bin}}</td>
                            <td class="text-center" hidden="true"> {{$cosecha->supervisor}}</td>
                            <td>
                                <form method="POST" action="{{url('/borrar_cosecha/'.$cosecha->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a type="submit" onclick="return confirm('¿Desea eliminar el parte de cosecha?')" id="borrar" class="btn peach-gradient btn-sm"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR
                                    </a>
                                </form>
                            </td>
                            <!--<a id="modificar" class="btn btn-primary btn-rounded mb-4 btn-sm m-0 text-center" href="/modalcosecha/{{$cosecha->id}}" role="button">Modificar </a>-->
                            <!--   <form method="POST" action="">
                                        <button class="btn btn-primary btn-rounded mb-4" type="submit" id="borrar">Modifica</button>
                                    </form> -->
                            <td>
                                <form method="PUT" action="/modalcosecha/{{$cosecha->id}}">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <a type="button" class="btn blue-gradient btn-sm" href="/modalcosecha/{{ $cosecha->id }}" data-toggle="modal" data-target="#modalcosecha{{ $cosecha->id }}" form method="POST" action="/modalcosecha/{{$cosecha->id}}" role="button"><i class="fas fa-eye mr-1" style="color:white"></i>VER</a>
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
                {{ $cosechas->render() }}
                <a class="btn btn-deep-orange"  href="{{action('cosechaController@verreportecosechaPDF.$cosecha.$cliente.$capataz')}}"><i class="fas fa-2x fa-print mr-2" style="color:white"></i>Imprimir</a>
            </div>

            <!--Table-->
        </div>

    </div>
</div>
<!--Section: Content-->
@endsection