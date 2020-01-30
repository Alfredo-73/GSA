@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-ms-6 col-md-6 col-lg-6">
            <div class="mx-auto">
                <div class="px-4">
                    <div class="table-wrapper">
                        <h1 class="text-center">LISTADO DE CLIENTES</h1>
                        <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nuevo_cliente') }}" role="button" style="margin-left:35rem;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO </a>

                        <!--BOTON AGREGAR PRODUCTO-------------------
                        
                        <form method="POST" action="">
                            <button class="btn btn-success mb-5" type="submit" id="agregar" style="margin-left:75rem">NUEVO</button>
                        </form> -->
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-dark indigo mb-4">

                    <!-- Navbar brand -->
                            <a class="navbar-brand" href="#">Buscador</a>

                            <!-- Collapsible content -->
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                <form class="form-inline ml-auto">
                                <div class="md-form my-0">
                                    <input name="buscarpor" class="form-control" type="text" placeholder="Nombre del cliente..." aria-label="Search">
                                </div>
                                <button href="#!" class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit"><i class="fas fa-search fa-2x mr-2" style="color:white"></i>Buscar</button>
                                <a class="fas fa-sync-alt" role="button" href=  {{ url('/abm_cliente') }} title="refrescar" style="cursor:pointer" name="Refrescar" >  Refrescar</a>
                                </form>

                            </div>
  <!-- Collapsible content -->

                    </nav>
            <!--        <form class="form-inline md-form mr-auto mb-4 float-md-right">
                        <input name="buscarpor" class="form-control mr-sm-2" type="text" placeholder="Buscar por cliente" aria-label="Search">
                        <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Buscar</button>
                    </form> -->
                    <!--Table-->
                    <table class="table table-hover text-center">

                        <!--Table head-->
                        <thead>
                            <tr>
                                <!--<th>
                                        <input class="form-check-input" type="checkbox" id="checkbox">
                                        <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
                                    </th>-->
                                <!--   <th class="th-lg text-center">
                                    <a>ID
                                        
                                    </a>-->
                                </th>
                                <th class="th-lg text-center">
                                    <a>NOMBRE
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>CUIT
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>

                            </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>


                                <!--<th scope="row">
                                        <input class="form-check-input" type="checkbox" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1" class="label-table"></label>
                                    </th>-->
                                <!--  <td> {{$cliente->id}}</td> -->
                                <td> {{$cliente->nombre}}</td>
                                <td> {{$cliente->cuit}}</td>

                                <td class="text-center"></td>
                                <td>
                                    <form method="POST" action="{{ url('/borrar_cliente/'.$cliente->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" onclick="return confirm('¿Desea eliminar el cliente?')" id="borrar" class="btn btn-danger btn-rounded mb-1 btn-sm text-center"><i class="fas fa-trash mr-2" style="color:white" role="button"></i> BORRAR
                                        </button>

                                        <!-- <button class="btn btn-danger" type="submit" id="borrar">Borrar</button>-->
                                    </form>
                                    <!-- <form method="POST" action="">

                                        <button class="btn btn-danger btn-rounded mb-4" type="submit" id="borrar">Borrar</button>
                                    </form> -->
                                </td>
                                <!--BOTON MODIFICAR NO FUNCIONA LA VISTA MODIFPRODUCTO, SI TOMA EL ID DEL PREODUCTO-------->
                                <td>
                                    <a id="modificar" class="btn btn-primary btn-rounded mb-1 btn-sm text-center" href="/modif_cliente/{{$cliente->id}}" role="button"><i class="fas fa-eye mr-1" style="color:white"></i>Modificar </a>

                                    <!--   <form method="POST" action="">
                                        <button class="btn btn-primary btn-rounded mb-4" type="submit" id="borrar">Modifica</button>
                                    </form> -->
                                </td>

                                <!--    <td>
                                  -- Button trigger modal --
                                    <div class="text-center">
                                        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Ver/Imp.</a>
                                    </div>
                                </td> -->

                            </tr>
                            @endforeach

                        </tbody>
                        <!--Table body-->
                    </table>

                    <div class="modal fade" id="modalRegisterForm" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">


                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">CLIENTE @if(!empty($cleinte)) {{$cliente->id}} @endif</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-book prefix grey-text"></i>
                                        <input type="text" id="orangeForm-name" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-name">Nombre @if(!empty($cleinte)) {{$cliente->nombre}} @endif</label>
                                    </div>
                                    <div class="md-form mb-5">
                                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                                        <input type="text" id="orangeForm-email" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-email">CUIT @if(!empty($cleinte)) {{$cliente->cuit}} @endif</label>
                                    </div>


                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-deep-orange">Imprimir</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--Table-->
                </div>

            </div>
        </div>
    </div>
</div>
<!--Section: Content-->
@endsection