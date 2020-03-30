@extends('layouts.app')
@section('scripts')
@endsection
@section('content')

<div id="resultados"></div>
<div class="col-12">
    <div class="table-wrapper">
        <h1 class="text-center mb-2" style="font-family:Verdana, Geneva, Tahoma, sans-serif">LISTADO DE EMPLEADOS</h1>
        @can('agregar_empleado')
    </div>
    <div class="row mb-3">
        <a id="agregar" class="btn primary-color-dark mb-2 rounded" href="{{ url('/nuevo_empleado') }}" role="button" style="margin-left:72rem;color:white"><i class="fas fa-2x fa-user-plus mr-2" style="color:white"></i>NUEVO</a>
        @endcan
    </div>

    <!--<p class="ml-3"><strong>Haz clic <a href=" {{ route ('empleado.excel') }}">aqui</a>
                para descargar en Excel los empleados
        </p></strong>-->

    <!--<div class="box box-info">
            <form action="{{ route('empleados.importar.excel') }}" method="post" enctype="multipart/form-data" class="mb-3" onclick="return alert('Seleccionar solo archivos son extencion .xlsx')">
                @csrf
                @if(Session::has('message'))
                <p>{{ Session::get('message') }}</p>
                @endif

                <input type="file" name="archivo">

                <button class="btn btn-lg btn-primary pull-right">IMPORTAR EMPLEADOS</button>
            </form>
        </div>-->


    <nav class="navbar navbar-expand-lg navbar-dark indigo mb-3 rounded">
        <!--<div class="row">
                            <p class="text-wrap" style="color:white; position:absolute; z-index:2; margin-left:8rem; margin-top:-2.5rem">INGRESE NOMBRE Y/O APELLIDO</span>
                        </div>-->
        <p class="navbar-brand ml-3" href="#">Buscador:</p>

        <form class="form-inline md-form mr-auto mb-4 float-right" action="">
            <input name="buscarpornombre" id="nombre" class="form-control mr-sm-2 text-white" type="search" placeholder="Nombre del Empleado" aria-label="Search">
            <input name="buscarporapellido" id="apellido" class="form-control mr-sm-2 text-white" type="search" placeholder="Apellido del Empleado" aria-label="Search">
            <button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit"><i class="fas fa-search fa-2x mr-2" style="color:white"></i>Buscar</button>
            <a href="{{ url('/empleado') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
        </form>
        <a id="importar" class="btn btn-sm btn-success" href="{{ route ('empleado.excel') }}" role="button"><i class="fa-2x far fa-file-excel mr-2"></i>EXPORTAR EXCEL</a>
        <!--<a id="importar" class="btn-sm btn-danger ml-3" href="{{ route ('empleado.excel') }}" role="button">IMPORTAR EXCEL<i class="fa-2x far fa-file-excel ml-2"></i></a>-->
        <div class="badge badge-pill badge-primary">
            <form action="{{ route('empleados.importar.excel') }}" method="post" enctype="multipart/form-data" class="ml-2" onclick="return alert('Seleccionar solo archivos con extencion .xlsx')">
                @csrf
                @if(Session::has('message'))
                <p>{{ Session::get('message') }}</p>
                @endif
                <input type="file" name="archivo">
                <button class="btn btn-sm btn-primary">IMP. EMPLEADOS</button>
            </form>
        </div>
    </nav>

</div>
<style>
    .estado1 {
        color: red !important;
        font-weight: bold
    }

    .estado2 {
        color: blue !important;
        font-weight: bold
    }
</style>
{{ $empleados->appends($_GET)->links() }}
<!--Table-->
<!--<table class="table-striped w-auto">-->
<table class="table-bordered table-hover mx-auto col-12">
    <thead class="thead-dark">
        <thead class="text-center">
            <tr height="60px" style="background-color:black; color:white">
                <th class="text-center">LEGAJO</th>
                <th class="text-center">NOMBRE</th>
                <th class="text-center">APELLIDO</th>
                <th class="text-center">CUIL</th>
                <th class="text-center">FECHA INGRESO</th>
                <th class="text-center">EMPRESA</th>
                <th class="text-center">CAPATAZ</th>
                <th class="text-center">CANTIDAD SANCIONES</th>
                <th COLSPAN=4 class="text-center">ACCIONES DISPONIBLES</th>
            </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
    <tbody>
        @foreach ($empleados as $empleado)
        <?php $cantidad_sanciones = 0; ?>
        @foreach($sanciones as $sancion)
        <?php if ($sancion['id_empleado'] == $empleado['id']) {
            $cantidad_sanciones = $cantidad_sanciones + 1;
        }
        ?>
        @endforeach
        <tr>
            <td class="text-center"> {{$empleado->legajo}}</td>
            <td class="text-center">{{$empleado->nombre}} </td>
            <td class="text-center">{{$empleado->apellido}} </td>
            <td class="text-center"> {{$empleado->cuil}}</td>
            <td class="text-center" name="fecha"> {{$empleado->fecha_ingreso}}</td>
            <td class="text-center"> {{$empleado->empresa->razon_social}}</td>
            <td class="text-center"> {{$empleado->capataz->nombre}}</td>
            @if($cantidad_sanciones > '0')
            <td class="estado1 text-center">{{$cantidad_sanciones}}</td>
            @elseif($cantidad_sanciones == '0')
            <td class="estado2 text-center">{{ $cantidad_sanciones}}</td>
            @endif
            <td class="text-center" hidden="true"> {{$empleado->observaciones}}</td>
            @can('borrar_empleado')
            <td class="text-center">
                <form method="POST" action="{{url('/borrar_empleado/'.$empleado->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <!--<a type="submit" onclick="return confirm('¿Desea eliminar el parte de empleado?')" id="borrar" class="btn peach-gradient btn-sm"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR
                                    </a>-->
                    <a type="submit" onclick="return confirm('¿Desea eliminar el parte de empleado?')" id="borrar" title="Borrar Registro" class="btn peach-gradient btn-sm" style="color:white"><i class="fas fa-times-circle" style="color:white"></i> BORRAR</a>
                </form>
            </td>
            @endcan
            <td class="text-center">
                <form method="PUT" action="/modal_empleado/{{$empleado->id}}">
                    @csrf
                    {{method_field('PUT')}}
                    <a type="button" class="btn blue-gradient btn-sm" href="/modal_empleado/{{ $empleado->id }}" data-toggle="modal" data-target="#modal_empleado{{ $empleado->id }}" form method="POST" action="/modalempleado/{{$empleado->id}}" role="button" style="color:white"><i class="fas fa-eye mr-1" style="color:white"></i>VER</a>
                    @csrf
                    {{method_field('PUT')}}
                    @include('modal_empleado')
                </form>
            </td>
            @can('agregar_sancion')
            <td>
                <a id="sancionar" class="btn blue-gradient btn-rounded btn-sm my-0" href="/nueva_sancion/{{ $empleado->id }}" role="button" title="Ver Registro"><i class="fas fa-gavel mr-1" style="color:white"></i>SANCIONAR</a>
            </td>
            @endcan
            @can('leer_sancion')
            <td>
                <a id="sancionado" class="btn blue-gradient btn-rounded btn-sm my-0" href="/empleadoSancionado/{{ $empleado->id }}" role="button"><i class="fas fa-list mr-1" style="color:white"></i>LISTADO SANCIONES</a>
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
    <!--Table body-->
</table>
<div class=" mt-3">
    {{ $empleados->appends($_GET)->links() }}
</div>
<!--Table-->
<!--Table-->
@endsection