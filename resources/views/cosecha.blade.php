@extends('layouts.app')

@section('content')
@section('scripts')
<script type="text/javascript">

</script>
@endsection

<div class="row justify">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="">
            <div class="px-4">
                <div class="table-wrapper">
                    <h1 class="text-center mb-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">PARTE DIARIO DE COSECHA</h1>
                    <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nueva_cosecha') }}" role="button" style="margin-left:72rem;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO </a>
                </div>

                <div class="container-fluid">
                    <nav class="navbar  navbar-dark indigo rounded mb-2">
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
                <!--{{ $cosechas->render() }}-->
            </div>
            {{ $cosechas->appends($_GET)->links() }}
            <!--Table-->
        </div>

    </div>
</div>
<!--Section: Content-->
@endsection