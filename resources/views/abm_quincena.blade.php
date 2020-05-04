@extends('layouts.app1')
@section('content')
<div class="row container-fluid col-6 mx-auto" id="contenido">
    <div class="container-fluid mx-auto text-center">
        <h1 class="mx-auto mb-5 mt-5" style="font-family:Verdana, Geneva, Tahoma, sans-serif">LISTADO DE QUINCENAS</h1>
        <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nueva_quincena') }}" role="button" style="margin-left:60%;color:white"><i class="fas fa-2x fa-plus mr-2" style="color:white"></i>NUEVA </a>
    </div>
    <!--TABLE-->
    <div class="container-fluid mx-auto">
        <div class="table-responsive text-nowrap btn-table">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <thead class="text-center">
                        <tr height="65px" style="background-color:black; color:white">
                            <th class="text-center">DESCRIPCION PERIODO </th>
                            <th COLSPAN=2 class="text-center">ACCIONES DISPONIBLES</th>
                        </tr>
                    </thead>
                    <!--Table body-->
                <tbody>
                    @foreach ($quincenas as $quincena)
                    <tr>
                        <td class="text-center"> {{$quincena->nombre}}</td>
                        <td>
                            <form method="POST" action="{{ url('/borrar_quincena/'.$quincena->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm('¿Desea eliminar la quincena?')" id="borrar" class="btn btn-danger btn-rounded mb-4"><i class="fas fa-trash mr-2" style="color:white" role="button"></i> BORRAR
                                </button>

                                <!-- <button class="btn btn-danger" type="submit" id="borrar">Borrar</button>-->
                            </form>

                        </td>
                        <!--BOTON MODIFICAR NO FUNCIONA LA VISTA MODIFPRODUCTO, SI TOMA EL ID DEL PREODUCTO-------->
                        <td class="text-center">
                            <a id="modificar" class="btn btn-primary btn-rounded mb-4" href="/modif_quincena/{{$quincena->id}}" role="button">Modificar </a>

                        </td>
                        @endforeach
                    </tr>


                </tbody>
                <!--Table body-->
            </table>
        </div>

        <div class="modal fade" id="modalRegisterForm" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">


                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">quincena @if(!empty($quincena)){{$quincena->id}} @endif</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-book prefix grey-text"></i>
                            <input type="text" id="orangeForm-name" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Nombre @if(!empty($quincena)){{$quincena->nombre}} @endif</label>
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

<!--Section: Content-->
@endsection