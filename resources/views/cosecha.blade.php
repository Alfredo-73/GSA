@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-ms-12 col-md-12 col-lg-12">
            <div class="mx-auto">
                <div class="px-4">
                    <div class="table-wrapper">
                        <h1 class="text-center">PARTE DIARIO DE COSECHA</h1>
                        <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nueva_cosecha') }}" role="button" style="margin-left:75rem; color:white">NUEVO </a>

                        <!--BOTON AGREGAR PRODUCTO-------------------
                        
                        <form method="POST" action="">
                            <button class="btn btn-success mb-5" type="submit" id="agregar" style="margin-left:75rem">NUEVO</button>
                        </form> -->
                    </div>
                    <!--Table-->
                    <table class="table-striped w-auto">

                        <!--Table head-->
                        <thead>
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
                                    <a>PROMEDIO KG/BIN
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>

                                <th class="th-lg text-center" hidden="true">
                                    <a>SUPERVISOR
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                            </tr>

                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                            @foreach ($cosechas as $cosecha)
                            <tr>
                                <!--<th scope="row">
                                        <input class="form-check-input" type="checkbox" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1" class="label-table"></label>
                                    </th>-->
                                <td class="text-center"> {{$cosecha->fecha}}</td>
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
                                        <button type="submit" onclick="return confirm('¿Desea eliminar el parte de cosecha?')" id="borrar" class=" btn peach-gradient mb-1 btn-sm m-0 text-center"> BORRAR
                                        </button>
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
                                        <button type="button" class="btn blue-gradient mb-1 btn-sm m-0 text-center" href="/modalcosecha/{{ $cosecha->id }}" data-toggle="modal" data-target="#modalcosecha{{ $cosecha->id }}" form method="POST" action="/modalcosecha/{{$cosecha->id}}">VER</button>
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
                </div>
                <!--Table-->
            </div>

        </div>
    </div>
    <!--Section: Content-->
    @endsection