@extends('layouts.app1')
@section('content')
<div class="row container-fluid col-md-10 col-lg-10" id="contenido">

    <div class="container-fluid mx-auto text-center">
        <h1 class="mx-auto mb-5 mt-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">DETALLE DE SANCIONES POR EMPLEADO</h1>
    </div>


    <div class="container-fluid">
        <nav class="navbar  navbar-dark indigo rounded mb-2">
            <span style="font-size:15px; font-family:Verdana, Geneva, Tahoma, sans-serif" class="text-white ml-5"><u>EMPLEADO</u>: {{$empleados->nombre}}, {{$empleados->apellido}} | <u>EMPRESA</u>: {{$empleados->empresa->razon_social}} | <u>CANTIDAD DE SANCIONES</u>: {{$cantidad_sancion}} | <u>CANTIDAD DE DIAS SANCIONADO</u>: {{$dias}}</span>
            <a href="/empleadoSancionado/{{ $empleados->id }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="table-responsive-lg text-nowrap btn-table">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <thead class="text-center">
                        <tr height="65px" style="background-color:black; color:white">
                            <th class="text-center">LEGAJO</th>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">APELLIDO</th>
                            <th class="text-center">DNI</th>
                            <th class="text-center">FECHA DE SANCION</th>
                            <th class="text-center">DIAS SANCIONADO</th>
                            <th class="text-center">FECHA REINCORPORACION</th>
                            <th class="text-center">CAPATAZ</th>
                            <th class="text-center">MOTIVO</th>
                            <th COLSPAN=2 class="text-center">ACCION</th>
                        </tr>
                        </<thead>
                    <tbody>
                        @foreach ($sanciones as $sancion)
                        <tr>
                            <td class="text-center"> {{$empleados->legajo}}</td>
                            <td class="text-center">{{$empleados->nombre}} </td>
                            <td class="text-center">{{$empleados->apellido}} </td>
                            <td class="text-center"> {{$empleados->dni}}</td>
                            <td class="text-center" name="fecha"> {{$sancion->fecha}}</td>
                            <td class="text-center"> {{$sancion->dias}}</td>
                            <td class="text-center"> {{$sancion->reincorporacion}}</td>
                            <td class="text-center"> {{$sancion->capataz->nombre}}</td>
                            <td class="text-center"> {{$sancion->motivo}}</td>
                            <td class="text-center">
                                <form method="POST" action="{{url('/borrar_sancion/'.$sancion->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a type="submit" onclick="return confirm('¿Desea eliminar el parte de sancion?')" id="borrar" class="btn peach-gradient btn-sm"><i class="fas fa-trash mr-2" style="color:white" role="button"></i>BORRAR
                                    </a>
                                </form>
                            </td>
                            <td class="text-center">
                                <form method="PUT" action="/modal_sancion/{{$sancion->id}}">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <a type="button" class="btn blue-gradient btn-sm" href="/modal_sancion/{{ $sancion->id }}" data-toggle="modal" data-target="#modal_sancion{{ $sancion->id }}" form method="POST" action="/modalsancion/{{$sancion->id}}" role="button"><i class="fas fa-eye mr-1" style="color:white"></i>VER</a>
                                    @csrf
                                    {{method_field('PUT')}}
                                    @include('modal_sancion')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>

            <H5 style="color:green">CANTIDAD DE SANCIONES: <strong>{{$cantidad_sancion}}</strong></H5>
            <H5 style="color:red">CANTIDAD DE DIAS SANCIONADO: <strong>{{$dias}}</strong></H5>

        </div>
    </div>
</div>
@endsection