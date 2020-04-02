@extends('layouts.app1')

@section('content')
@section('scripts')
<script type="text/javascript">

</script>
@endsection

<!--<div class="row justify">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="">
            <div class="px-4">
                <div class="table-wrapper">-->
<div class="row container-fluid col-10" id="contenido">
    <h1 class="mx-auto" style="font-family:Verdana, Geneva, Tahoma, sans-serif">SANCIONES</h1>
        <!-- <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nueva_sancion') }}" role="button" style="margin-left:72rem;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO </a>-->
</div>

<div class="container-fluid">
    <nav class="navbar  navbar-dark indigo rounded mb-2">
        <span style="font-size:15px; font-family:Verdana, Geneva, Tahoma, sans-serif" class="text-white ml-5">INGRESE RANGO DE FECHA Y/O EMPLEADO:</span>
        <form class="form-inline">
            <input class="md-form mr-2 text-center rounded" type="date" placeholder="Desde" aria-label="Search" name="fechadesde" role="button">
            <input class="md-form mr-2 text-center rounded" type="date" placeholder="Hasta" aria-label="Search" name="fechahasta" role="button">
            <!--<input name="name" class="form-control mr-sm-2" type="search" placeholder="Buscar por name" aria-label="Search">-->

            <input name="buscarpornombre" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
            <input name="buscarporapellido" class="form-control mr-sm-2" type="search" placeholder="Buscar por apellido" aria-label="Search">

            <button class="btn blue-gradient btn-rounded btn-sm my-0"><i class="fas fa-search fa-2x mr-2" style="color:white" name="buscar"></i>Buscar</button>

            <a href="{{ url('/sancion') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
            <!--     <a role="button" class="btn btn-deep-orange" href="imprimir_sancion"><i class="fas fa-print mr-2" style="color:white"></i>Imprimir Busqueda</a> 
                        <a role="button" class="btn btn-deep-orange" href="imprimir_sanciones"><i class="fas fa-print mr-2" style="color:white"></i>Imprimir Reporte</a> -->
        </form>
    </nav>
</div>

<div class="">
    <div class="table-wrapper">
        <table class="table-bordered table-hover mx-auto">
            <thead class="thead-dark">
                <thead class="text-center">
                    <tr height="60px" style="background-color:black; color:white">
                        <th class="text-center">LEGAJO</th>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">APELLIDO</th>
                        <th class="text-center">DNI</th>
                        <th class="text-center">FECHA DE SANCION</th>
                        <th class="text-center">DIAS SANCIONADO</th>
                        <th class="text-center">FECHA REINCORPORACION</th>
                        <th class="text-center">CAPATAZ</th>
                        <!--<th class="th-lg text-center">EMPRESA</th>-->
                        <th COLSPAN=2 class="text-center">ACCION</th>
                    </tr>

                    </<thead>
                    <!--Table head-->

                    <!--Table body-->
                <tbody>
                    @foreach ($sanciones as $sancion)
                    <tr>
                        @foreach($empleados as $empleado)
                        @if($empleado->id == $sancion->id_empleado)
                        <td class="text-center text-truncate"> {{$empleado->legajo}}</td>
                        <td class="text-center text-truncate">{{$empleado->nombre}} </td>
                        <td class="text-center text-truncate">{{$empleado->apellido}} </td>
                        <td class="text-center text-truncate"> {{$empleado->dni}}</td>
                        <td class="text-center text-truncate" name="fecha"> {{$sancion->fecha}}</td>
                        <td class="text-center text-truncate"> {{$sancion->dias}}</td>
                        <td class="text-center text-truncate"> {{$sancion->reincorporacion}}</td>
                        <td class="text-center text-truncate"> {{$sancion->capataz->nombre}}</td>
                        <!--<td class="text-center"> {{$sancion->empresa->razon_social}}</td>-->

                        <td>
                            <form method="POST" action="{{url('/borrar_sancion/'.$sancion->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a type="submit" onclick="return confirm('¿Desea eliminar el parte de sancion?')" id="borrar" class="btn peach-gradient btn-sm"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR
                                </a>
                            </form>
                        </td>
                        <td>
                            <form method="PUT" action="/modal_sancion/{{$sancion->id}}">
                                @csrf
                                {{method_field('PUT')}}
                                <a type="button" class="btn blue-gradient btn-sm" href="/modal_sancion/{{ $sancion->id }}" data-toggle="modal" data-target="#modal_sancion{{ $sancion->id }}" form method="POST" action="/modalsancion/{{$sancion->id}}" role="button"><i class="fas fa-eye mr-1" style="color:white"></i>VER</a>
                                @csrf
                                {{method_field('PUT')}}
                                @include('modal_sancion')
                            </form>
                        </td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
                <!--Table body-->
        </table>
    </div>
    <!--Table-->
</div>

</div>
</div>
<!--Section: Content-->
@endsection