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
                    <h1 class="text-center mb-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">LISTADO DE EMPLEADOS</h1>
                    <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nuevo_empleado') }}" role="button" style="margin-left:72rem;color:white"><i class="fas fa-2x fa-user-plus mr-2" style="color:white"></i>NUEVO </a>

                </div>

                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-dark indigo mb-4 rounded">
                        <!--<div class="row">
                            <p class="text-wrap" style="color:white; position:absolute; z-index:2; margin-left:8rem; margin-top:-2.5rem">INGRESE NOMBRE Y/O APELLIDO</span>
                        </div>-->
                        <p class="navbar-brand ml-5" href="#">Buscador:</p>


                        <form class="form-inline md-form mr-auto mb-4 float-right" action="">
                            <input name="buscarpornombre" id="nombre" class="form-control mr-sm-2 text-white" type="search" placeholder="Nombre del Empleado" aria-label="Search">
                            <input name="buscarporapellido" id="apellido" class="form-control mr-sm-2 text-white" type="search" placeholder="Apellido del Empleado" aria-label="Search">
                            <button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit"><i class="fas fa-search fa-2x mr-2" style="color:white"></i>Buscar</button>
                            <a href="{{ url('/empleado') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
                        </form>
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
                <table class="table table-bordered table-hover">
                    <!--OPCIONES DE FORMATO DE TABLAS -->
                    <!--<table border='1' width='900px' align='center' cellspacing='2' cellpadding='2'>-->
                    <!--<table class="table-hover" align="center" cellspacing="1" cellpadding="2" border="2">-->

                    <!--Table head-->
                    <thead class="thead-dark">
                        <!--<thead class="text-center">-->
                        <tr height="60px" style="background-color:black; color:white">
                            <!--<th>
                                        <input class="form-check-input" type="checkbox" id="checkbox">
                                        <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
                                    </th>-->
                            <th class="text-center">
                                <a>LEGAJO
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="text-center">
                                <a>NOMBRE
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="text-center">
                                <a>APELLIDO
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="text-center">
                                <a>CUIL
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="text-center">
                                <a>FECHA INGRESO
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="text-center">
                                <a>EMPRESA
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="text-center">
                                <a>CAPATAZ
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="text-center">
                                <a>CANTIDAD SANCIONES
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th COLSPAN=4 class="text-center">ACCIONES DISPONIBLES</th>
                        </tr>

                        </!--<thead>
                        <!--Table head-->

                        <!--Table body-->
                    <tbody>
                        @foreach ($empleados as $empleado)
                        <?php $cantidad_sanciones = 0; ?>
                        @foreach($sanciones as $sancion)
                        <?php if ($sancion['legajo'] == $empleado['legajo']) {
                            $cantidad_sanciones = $cantidad_sanciones + 1;
                        }
                        ?>
                        @endforeach
                        <tr>
                            <!--<th scope="row">
                                        <input class="form-check-input" type="checkbox" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1" class="label-table"></label>
                                    </th>-->
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
                            <td class="text-center">
                                <form method="POST" action="{{url('/borrar_empleado/'.$empleado->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <!--<a type="submit" onclick="return confirm('¿Desea eliminar el parte de empleado?')" id="borrar" class="btn peach-gradient btn-sm"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR
                                    </a>-->
                                    <a type="submit" onclick="return confirm('¿Desea eliminar el parte de empleado?')" id="borrar" title="Borrar Registro" class="btn peach-gradient btn-sm" style="color:white"><i class="fas fa-times-circle" style="color:white"></i> BORRAR</a>
                                </form>
                            </td>
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
                            <td>
                                <a id="sancionar" class="btn blue-gradient btn-rounded btn-sm my-0" href="/nueva_sancion/{{ $empleado->id }}" role="button" title="Ver Registro"><i class="fas fa-gavel mr-1" style="color:white"></i>SANCIONAR</a>
                            </td>
                            <td>
                                <a id="sancionado" class="btn blue-gradient btn-rounded btn-sm my-0" href="/empleadoSancionado/{{ $empleado->id }}" role="button"><i class="fas fa-list mr-1" style="color:white"></i>LISTADO SANCIONES</a>
                            </td>
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