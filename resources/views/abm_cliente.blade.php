@extends('layouts.app1')

@section('content')
<div class="row container-fluid col-6 mx-auto" id="contenido">

    <div class="container-fluid mx-auto text-center">
        <h1 class="mx-auto mb-5 mt-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">LISTADO DE CLIENTES</h1>

        <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nuevo_cliente') }}" role="button" style="margin-left:50%; color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO</a>

    </div>

    <nav class="navbar navbar-expand-lg navbar-dark indigo mb-4" style="width:100%">
        <div class="mx-auto">
            
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <span class="navbar-brand">Buscador:</span>
                <form class="form-inline">
                    <div class="md-form">
                        <input name="buscarpor" class="form-control" type="text" placeholder="Nombre del cliente..." aria-label="Search">
                    </div>
                    <button href="#!" class="btn btn-outline-white btn-sm" type="submit"><i class="fas fa-search fa-2x mr-2" style="color:white"></i>Buscar</button>
                    <a href="{{ url('/abm_cliente') }}" title="Refrescar" name="Refrescar" style="color:white; font-family:Verdana, Geneva, Tahoma, sans-serif"><i class="fas fa-sync-alt ml-1" style="color:white"></i>Refrescar</a>
                </form>

            </div>
            <!-- Collapsible content -->
        </div>
    </nav>

    <!--Table-->
    <div class="container-fluid mx-auto">
        <div class="table-responsive text-nowrap btn-table">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <thead class="text-center">
                        <tr height="65px" style="background-color:black; color:white">
                            </th>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">CUIT</th>
                            <th COLSPAN=2 class="text-center">ACCIONES DISPONIBLES</th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td class="text-center"> {{$cliente->nombre}}</td>
                        <td class="text-center"> {{$cliente->cuit}}</td>
                        <td class="text-center">
                            <form method="POST" action="{{ url('/borrar_cliente/'.$cliente->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm('¿Desea eliminar el cliente?')" id="borrar" class="btn btn-danger btn-rounded mb-1 btn-sm text-center"><i class="fas fa-trash mr-2" style="color:white" role="button"></i> BORRAR
                                </button>
                            </form>
                        </td>
                        <td class="text-center">
                            <a id="modificar" class="btn btn-primary btn-rounded mb-1 btn-sm text-center" href="/modif_cliente/{{$cliente->id}}" role="button"><i class="fas fa-edit mr-2" style="color:white"></i>Modificar </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>
    </div>
</div>

<!--Section: Content-->
@endsection