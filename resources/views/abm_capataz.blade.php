@extends('layouts.app1')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-ms-6 col-md-6 col-lg-6">
            <div class="mx-auto">
                <div class="px-4">
                    <div class="table-wrapper">
                        <h1 class="text-center">LISTADO DE CUADRILLAS</h1>
                        <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nuevo_capataz') }}" role="button" style="margin-left:35rem;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVO </a>

                        <!--BOTON AGREGAR PRODUCTO-------------------
                        
                        <form method="POST" action="">
                            <button class="btn btn-success mb-5" type="submit" id="agregar" style="margin-left:75rem">NUEVO</button>
                        </form> -->
                    </div>
                    <!--Table-->
                    <table class="table table-bordered table-hover">

                        <!--Table head-->
                        <thead class="thead-dark">
                            <tr height="60px" style="background-color:black; color:white">
                                <!--<th>
                                        <input class="form-check-input" type="checkbox" id="checkbox">
                                        <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
                                    </th>-->

                                <th class="th-lg text-center">
                                    <a>CUADRILLA
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th COLSPAN=2 class="text-center">ACCIONES DISPONIBLES</th>


                            </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                            @foreach ($capataz as $capat)
                            <tr>


                                <!--<th scope="row">
                                        <input class="form-check-input" type="checkbox" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1" class="label-table"></label>
                                    </th>-->
                                <td class="text-center"> {{$capat->nombre}}</td>

                                <td class="text-center">
                                    <form method="POST" action="{{ url('/borrar_capataz/'.$capat->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" onclick="return confirm('¿Desea eliminar el capataz?')" id="borrar" class="btn btn-danger btn-rounded mb-4"><i class="fas fa-trash mr-2" style="color:white" role="button"></i> BORRAR
                                        </button>

                                        <!-- <button class="btn btn-danger" type="submit" id="borrar">Borrar</button>-->
                                    </form>
                                    <!-- <form method="POST" action="">

                                        <button class="btn btn-danger btn-rounded mb-4" type="submit" id="borrar">Borrar</button>
                                    </form> -->
                                </td>
                                <!--BOTON MODIFICAR NO FUNCIONA LA VISTA MODIFPRODUCTO, SI TOMA EL ID DEL PREODUCTO-------->
                                <td class="text-center">
                                    <a id="modificar" class="btn btn-primary btn-rounded mb-4" href="/modif_capataz/{{$capat->id}}" role="button"><i class="far fa-edit mr-2"></i>Modificar </a>

                                    <!--   <form method="POST" action="">
                                        <button class="btn btn-primary btn-rounded mb-4" type="submit" id="borrar">Modifica</button>
                                    </form> -->
                                </td>

                                <!--<td>
                                   - Button trigger modal 
                                    <div class="text-center">
                                        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Ver/Imp.</a>
                                    </div>
                                </td>-->


                            </tr>
                            @endforeach

                        </tbody>
                        <!--Table body-->
                    </table>

                    <div class="modal fade" id="modalRegisterForm" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">


                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">CAPATAZ @if(!empty($capat)){{$capat->id}} @endif</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-book prefix grey-text"></i>
                                        <input type="text" id="orangeForm-name" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-name">Nombre @if(!empty($capat)){{$capat->nombre}} @endif</label>
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