@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-ms-12 col-md-12 col-lg-12">
            <div class="mx-auto">
                <div class="px-4">
                    <div class="table-wrapper">
                        <h1 class="text-center">PARTE DIARIO DE COSECHA</h1>
                         <a id="agregar" class="btn btn-success mb-5 rounded" href="{{ url('/nueva_cosecha') }}" role="button" style="margin-left:75rem" >NUEVO </a>

                        <!--BOTON AGREGAR PRODUCTO-------------------
                        
                        <form method="POST" action="">
                            <button class="btn btn-success mb-5" type="submit" id="agregar" style="margin-left:75rem">NUEVO</button>
                        </form> -->
                    </div>
                    <!--Table-->
                    <table class="table table-hover text-center">

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
                                <th class="th-lg text-center">
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

                                <th class="th-lg text-center">
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
                                <td> {{$cosecha->fecha}}</td>
                                <td> {{$cosecha->cliente->nombre}}</td>
                                <td> {{$cosecha->capataz->nombre}}</td>
                                <td> {{$cosecha->jornales}}</td>
                                <td> {{$cosecha->cosecheros}}</td>
                                <td> {{$cosecha->bines}}</td>
                                <td> {{$cosecha->maletas}}</td>
                                <td> {{$cosecha->toneladas}}</td>
                                <td> {{$cosecha->prom_kg_bin}}</td>
                                <td> {{$cosecha->supervisor}}</td>


                                <td class="text-center"></td>
                                <td>
                                        <form method="POST" action="{{ url('/borrar_cosecha/'.$cosecha->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('¿Desea eliminar el parte de cosecha?')" id= "borrar" class="btn btn-danger btn-rounded mb-4"> BORRAR
                                            </button>

                                           <!-- <button class="btn btn-danger" type="submit" id="borrar">Borrar</button>-->
                                        </form>
                                   <!-- <form method="POST" action="">

                                        <button class="btn btn-danger btn-rounded mb-4" type="submit" id="borrar">Borrar</button>
                                    </form> -->
                                </td>
                                <!--BOTON MODIFICAR NO FUNCIONA LA VISTA MODIFPRODUCTO, SI TOMA EL ID DEL PREODUCTO-------->
                                <td>
                                    <a id="modificar" class="btn btn-primary btn-rounded mb-4" href="/modif_cosecha/{{$cosecha->id}}" role="button" >Modificar </a>

                                 <!--   <form method="POST" action="">
                                        <button class="btn btn-primary btn-rounded mb-4" type="submit" id="borrar">Modifica</button>
                                    </form> -->
                                </td>

                                <td>
                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Ver/Imp.</a>
                                    </div>
                                </td>
                              
                            </tr>
                        @endforeach

                        </tbody>
                        <!--Table body-->
                    </table>

                    <div class="modal fade" id="modalRegisterForm" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              

                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">COSECHA @if(!empty($cosecha)){{$cosecha->fecha}} @endif</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-book prefix grey-text"></i>
                                        <input type="text" id="orangeForm-name" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-name">Cliente @if(!empty($cosecha)) {{$cosecha->id_cliente}} @endif</label>
                                    </div>
                                    <div class="md-form mb-5">
                                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                                        <input type="text" id="orangeForm-email" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-email">Capataz @if(!empty($cosecha)) {{$cosecha->id_capataz}} @endif</label>
                                    </div>

                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Jornales @if(!empty($cosecha)) {{$cosecha->jornales}} @endif</label>
                                    </div>

                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Cosecheros  @if(!empty($cosecha)) {{$cosecha->cosecheros}} @endif</label>
                                    </div>

                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Bines  @if(!empty($cosecha)) {{$cosecha->bines}} @endif</label>
                                    </div>

                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Maletas @if(!empty($cosecha)) {{$cosecha->maletas}} @endif</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Toneladas  @if(!empty($cosecha)) {{$cosecha->toneladas}} @endif</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Promedio KG/BIN  @if(!empty($cosecha)) {{$cosecha->prom_kg_bin}} @endif</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Supervisor   @if(!empty($cosecha)) {{$cosecha->supervisor}} @endif</label>
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