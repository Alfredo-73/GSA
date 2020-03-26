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
                    <h1 class="text-center mb-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">SANCIONES</h1>
               <!-- <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nueva_sancion') }}" role="button" style="margin-left:72rem;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO </a>-->
                </div>

                 <div class="container-fluid">
                    <nav class="navbar  navbar-dark indigo rounded mb-2">
                        <span style="font-size:15px; font-family:Verdana, Geneva, Tahoma, sans-serif" class="text-white ml-5">INGRESE RANGO DE FECHA Y/O EMPLEADO:</span>
                        <form class="form-inline">
                            <input class="md-form mr-2 text-center rounded" type="date" placeholder="Desde" aria-label="Search" name="fechadesde" role="button">
                            <input class="md-form mr-2 text-center rounded" type="date" placeholder="Hasta" aria-label="Search" name="fechahasta" role="button">
                            <input name="name" class="form-control mr-sm-2" type="search" placeholder="Buscar por name" aria-label="Search">

                            <input name="buscarpornombre" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
                            <input name="buscarporapellido" class="form-control mr-sm-2" type="search" placeholder="Buscar por apellido" aria-label="Search">
    
                       <!--    <select class="selectpicker show-menu-arrow" name="buscarporcapataz" value="">
                                <option>Capataz</option>
                                @foreach($capataz as $capat)
                                <option value="{{$capat->id}}">{{$capat->nombre}}</option>
                                @endforeach
                            </select>
                            <select class="selectpicker show-menu-arrow" name="buscarporsanciones" value="">
                                <option>Sanciones</option>
                                @foreach($sanciones as $sancion)
                                <option value="{{$sancion->id}}">{{$sancion->legajo}}</option>
                                @endforeach
                            </select>-->
                            <button class="btn blue-gradient btn-rounded btn-sm my-0"><i class="fas fa-search fa-2x mr-2" style="color:white" name="buscar"></i>Buscar</button>

                            <a href="{{ url('/sancion') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
                    <!--     <a role="button" class="btn btn-deep-orange" href="imprimir_sancion"><i class="fas fa-print mr-2" style="color:white"></i>Imprimir Busqueda</a> 
                        <a role="button" class="btn btn-deep-orange" href="imprimir_sanciones"><i class="fas fa-print mr-2" style="color:white"></i>Imprimir Reporte</a> -->
                        </form>
                    </nav>
                </div>

                <!--Table-->
                <!--<table class="table-striped w-auto">-->
                <table class="table table-bordered table-hover">

                    <!--Table head-->
                <thead class="thead-dark">
                    <thead class="text-center">
                        <tr height="60px" style="background-color:black; color:white">
                        
                            <!--<th>
                                        <input class="form-check-input" type="checkbox" id="checkbox">
                                        <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
                                    </th>-->
                            <th class="th-lg text-center" hidden='true'>
                                <a>LEGAJO
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>NOMBRE
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>APELLIDO
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>DNI
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>FECHA DE SANCION
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>DIAS SANCIONADO
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>FECHA REINCORPORACION
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>CAPATAZ
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>EMPRESA
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>

                            <th COLSPAN=2 class="text-center">ACCION</th>
                        </tr>

                        </<thead>
                        <!--Table head-->

                        <!--Table body-->
                    <tbody>
                        @foreach ($sanciones as $sancion)
                        <tr>
                            <!--<th scope="row">
                                        <input class="form-check-input" type="checkbox" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1" class="label-table"></label>
                                    </th>-->
                            @foreach($empleados as $empleado)
                            @if($empleado->id == $sancion->id_empleado)
                            <td class="text-center" hidden='true'> {{$empleado->legajo}}</td>
                            <td class="text-center" >{{$empleado->nombre}} </td>
                            <td class="text-center">{{$empleado->apellido}} </td>
                            <td class="text-center"> {{$empleado->dni}}</td> 
                            <td class="text-center" name="fecha"> {{$sancion->fecha}}</td>
                            <td class="text-center"> {{$sancion->dias}}</td>
                            <td class="text-center"> {{$sancion->reincorporacion}}</td>
                            <td class="text-center"> {{$sancion->capataz->nombre}}</td> 
                            <td class="text-center"> {{$sancion->empresa->razon_social}}</td>
                        
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