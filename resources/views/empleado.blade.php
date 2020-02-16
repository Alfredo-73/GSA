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
                    <h1 class="text-center mb-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">EMPLEADOS</h1>
                    <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nuevo_empleado') }}" role="button" style="margin-left:72rem;color:white"><i class="fas fa-2x fa-user-plus mr-2" style="color:white"></i>NUEVO </a>

                </div>

                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg navbar-dark indigo mb-4 rounded">
                        <div class="row">
                            <p class="text-wrap" style="color:white; position:absolute; z-index:2; margin-left:8rem; margin-top:-2.5rem">INGRESE SANCION Y/O CAPATAZ</span>
                        </div>
                        <a class="navbar-brand ml-3" href="#">Buscador:</a>
                        
                  
                        <form class="form-inline md-form mr-auto mb-4 float-right" action="">
                        <!--<select name="buscarporsanciones" class="selectpicker show-menu-arrow" >
                        <option>Sanciones</option>
                                @foreach($sanciones as $sancion)
                        <option value="{{$sancion->id}}" @if(old('buscarporsanciones'))selected @endif >{{$sancion->nombre}}</option>
                        @endforeach
                    
                        </select>
                        <select name="buscarporcapataz" class="selectpicker show-menu-arrow" >
                        <option>Capataz</option>
                        @foreach($capataz as $capat)
                        <option value="{{$capat->id}}" @if(old('buscarporcapataz'))selected @endif>{{$capat->nombre}}</option>
                        @endforeach
                        </select>-->
                         <input name="buscarpornombre" class="form-control mr-sm-2 text-white" type="search" placeholder="Buscar por nombre empleado" aria-label="Search">
                            <input name="buscarporapellido" class="form-control mr-sm-2 text-white" type="search" placeholder="Buscar por apellido empleado" aria-label="Search">
    

                        <button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit"><i class="fas fa-search fa-2x mr-2" style="color:white"></i>Buscar</button>
                        <a class="fas fa-sync-alt" role="button" href=  {{ url('/empleado') }}  style="cursor:pointer" title="refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif" >  Refrescar</a>
            <!--    <a class="btn btn-deep-orange" href=""><i class="fas fa-print mr-2" style="color:white"></i>Imprimir Busqueda</a> 
                <a class="btn btn-deep-orange" href="/imprimir_empleado"><i class="fas fa-print mr-2" style="color:white"></i>Imprimir reporte</a>   -->  

            </form>
                    </nav>
                </div>

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
                            <th class="th-lg text-center" hidden='true'>
                                <a>LEGAJO
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center" >
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
                                <a>CUIL
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>FECHA INGRESO
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>EMPRESA
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>CAPATAZ
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                            <th class="th-lg text-center">
                                <a>SANCIONES
                                    <!--<i class="fas fa-sort ml-1"></i>-->
                                </a>
                            </th>
                           

                            <th COLSPAN=4 class="text-center">ACCION</th>
                        </tr>

                        </<thead>
                        <!--Table head-->

                        <!--Table body-->
                    <tbody>
                        @foreach ($empleados as $empleado)
                        <tr>
                            <!--<th scope="row">
                                        <input class="form-check-input" type="checkbox" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1" class="label-table"></label>
                                    </th>-->
                            <td class="text-center" hidden='true' > {{$empleado->legajo}}</td>
                            <td class="text-center" >{{$empleado->nombre}} </td>
                            <td class="text-center">{{$empleado->apellido}} </td>
                            <td class="text-center"> {{$empleado->cuil}}</td>
                            <td class="text-center" name="fecha"> {{$empleado->fecha_ingreso}}</td>
                            <td class="text-center"> {{$empleado->empresa->razon_social}}</td>
                            <td class="text-center"> {{$empleado->capataz->nombre}}</td>
                            <td class="text-center">@if(!empty($empleado->id_sanciones)) Tiene @else No tiene @endif</td>
                            
                            <td class="text-center" hidden="true"> {{$empleado->observaciones}}</td>
                            <td>
                                <form method="POST" action="{{url('/borrar_empleado/'.$empleado->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a type="submit" onclick="return confirm('¿Desea eliminar el parte de empleado?')" id="borrar" class="btn peach-gradient btn-sm"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR
                                    </a>
                                </form>
                            </td>
                            <td>
                                <form method="PUT" action="/modal_empleado/{{$empleado->id}}">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <a type="button" class="btn blue-gradient btn-sm" href="/modal_empleado/{{ $empleado->id }}" data-toggle="modal" data-target="#modal_empleado{{ $empleado->id }}" form method="POST" action="/modalempleado/{{$empleado->id}}" role="button"><i class="fas fa-eye mr-1" style="color:white"></i>VER</a>
                                    @csrf
                                    {{method_field('PUT')}}
                                    @include('modal_empleado')
                                </form>
                            </td>
                            <td>
                                <a id="sancionar" class="btn primary-color-dark btn-sm " href="/nueva_sancion/{{ $empleado->id }}" role="button" style="color:white"><i class="fas fa-gavel mr-1" style="color:white"></i>SANCIONAR </a>
                            </td>
                            <td>
                            <a id="sancionado" class="btn primary-color-dark btn-sm " href="/empleadoSancionado/{{ $empleado->id }}" role="button" style="color:white"><i class="fas fa-list mr-1" style="color:white"></i>LISTADO SANCIONES </a>
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