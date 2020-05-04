@extends('layouts.app1')
@section('scripts')
@endsection
@section('content')
<div class="row container-fluid col-md-10 col-lg-10" id="contenido">

    <div class="container-fluid mx-auto text-center">
        <h1 class="mx-auto mb-5 mt-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">LISTADO DE EMPLEADOS</h1>
    </div>

    <div class="container-fluid">
        <nav class="navbar  navbar-dark indigo rounded mb-2">
            <p class="navbar-brand ml-2" href="#">Buscador:</p>

            <form class="form-inline md-form mr-auto mb-4 float-right" action="">
                <input name="buscarpornombre" id="nombre" class="form-control mr-sm-2 text-white" type="search" placeholder="Nombre del Empleado" aria-label="Search">
                <input name="buscarporapellido" id="apellido" class="form-control mr-sm-2 text-white" type="search" placeholder="Apellido del Empleado" aria-label="Search">
                <button class="btn blue-gradient btn-rounded btn-sm" type="submit"><i class="fas fa-search fa-2x mr-2" style="color:white"></i>Buscar</button>
                <a class="ml-2" href="{{ url('/empleado') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
            </form>

            @can('agregar_empleado')
            <div>
                <a id="agregar" class="btn blue-gradient btn-rounded btn-sm" href="{{ url('/nuevo_empleado') }}" role="button" style="color:white"><i class="fas fa-2x fa-user-plus mr-2" style="color:white"></i>NUEVO</a>
            </div>
            @endcan

            <a id="importar" class="btn btn-success ml-3" style="width:15rem;" href="{{ route ('empleado.excel') }}" role="button"><i class="far fa-file-excel mr-2"></i>EXPORTAR A EXCEL</a>
            <!--<a id="importar" class="btn-sm btn-danger ml-3" href="{{ route ('empleado.excel') }}" role="button">IMPORTAR EXCEL<i class="fa-2x far fa-file-excel ml-2"></i></a>-->

            <div class="badge  badge-pill badge-primary">
                <form action="{{ route('empleados.importar.excel') }}" method="post" enctype="multipart/form-data" class="ml-2" onclick="return alert('Seleccionar solo archivos con extencion .xlsx')">
                    @csrf
                    @if(Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                    @endif
                    <input type="file" name="archivo">
                    <button class="btn blue-gradient btn-sm text-truncate">IMP. EMPLEADOS</button>
                </form>
            </div>
        </nav>
    </div>

    <div class="row container-fluid">
        {{ $empleados->appends($_GET)->links() }}
    </div>

    <style>
        /*CONFIGURO EL COLOR DE CANTIDAD DE SANCIONES*/
        .estado1 {
            color: red !important;
            font-weight: bold
        }

        .estado2 {
            color: blue !important;
            font-weight: bold
        }
    </style>
    <!--Table-->

    <div class="container-fluid">
        <div class="table-responsive-lg text-nowrap btn-table">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <thead class="text-center">
                        <tr height="65px" style="background-color:black; color:white">
                            <th class="text-center">LEGAJO</th>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">APELLIDO</th>
                            <th class="text-center">CUIL</th>
                            <th class="text-center">FECHA INGRESO</th>
                            <th class="text-center">EMPRESA</th>
                            <th class="text-center">CAPATAZ</th>
                            <th class="text-center">CANTIDAD DE SANCIONES</th>
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
                        <td class="text-center text-truncate"> {{$empleado->legajo}}</td>
                        <td class="text-center text-truncate">{{$empleado->nombre}} </td>
                        <td class="text-center text-truncate">{{$empleado->apellido}} </td>
                        <td class="text-center text-truncate"> {{$empleado->cuil}}</td>
                        <td class="text-center text-truncate" name="fecha"> {{$empleado->fecha_ingreso}}</td>
                        <td class="text-center text-truncate"> {{$empleado->empresa->razon_social}}</td>
                        <td class="text-center text-truncate"> {{$empleado->capataz->nombre}}</td>
                        @if($cantidad_sanciones > '0')
                        <td class="estado1 text-center text-truncate">{{$cantidad_sanciones}}</td>
                        @elseif($cantidad_sanciones == '0')
                        <td class="estado2 text-center text-truncate">{{ $cantidad_sanciones}}</td>
                        @endif
                        <td class="text-center" hidden="true"> {{$empleado->observaciones}}</td>
                        @can('borrar_empleado')
                        <td class="text-center text-truncate">
                            <form method="POST" action="{{url('/borrar_empleado/'.$empleado->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <!--<a type="submit" onclick="return confirm('¿Desea eliminar el parte de empleado?')" id="borrar" class="btn peach-gradient btn-sm"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR
                                    </a>-->
                                <a type="submit" onclick="return confirm('¿Desea eliminar el parte de empleado?')" id="borrar" title="Borrar Registro" class="btn peach-gradient mb-1 btn-sm m-0 text-center text-truncate" style="color:white"><i class="fas fa-trash mr-0" style="color:white"></i> BORRAR</a>

                            </form>
                        </td>
                        @endcan
                        <td class="text-center text-truncate">
                            <form method="PUT" action="/modal_empleado/{{$empleado->id}}">
                                @csrf
                                {{method_field('PUT')}}
                                <a type="button" class="btn blue-gradient btn-sm m-0" href="/modal_empleado/{{ $empleado->id }}" data-toggle="modal" data-target="#modal_empleado{{ $empleado->id }}" form method="POST" action="/modalempleado/{{$empleado->id}}" role="button" style="color:white"><i class="fas fa-eye mr-1" style="color:white"></i>VER</a>
                                @csrf
                                {{method_field('PUT')}}
                                @include('modal_empleado')
                            </form>
                        </td>
                        @can('agregar_sancion')
                        <td>
                            <a id="sancionar" class="btn blue-gradient btn-rounded btn-sm my-0 m-0" href="/nueva_sancion/{{ $empleado->id }}" role="button" title="Ver Registro"><i class="fas fa-gavel mr-1" style="color:white"></i>SANCIONAR</a>
                        </td>
                        @endcan
                        @can('leer_sancion')
                        <td>
                            <a id="sancionado" class="btn blue-gradient btn-rounded btn-sm my-0 m-0" href="/empleadoSancionado/{{ $empleado->id }}" role="button"><i class="fas fa-list mr-1" style="color:white"></i>LISTADO SANCIONES</a>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
                <!--Table body-->
            </table>
            <div class="mt-3">
                {{ $empleados->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
<!--Table-->
@endsection