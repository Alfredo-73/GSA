@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-ms-6 col-md-6 col-lg-6">
            <div class="mx-auto">
                <div class="px-4">
                    <div class="table-wrapper">
                        <h1 class="text-center">LISTADO DE QUINCENAS</h1>
                         <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nueva_quincena') }}" role="button" style="margin-left:35rem;color:white" >NUEVA </a>

                        <!--BOTON AGREGAR PRODUCTO-------------------
                        
                        <form method="POST" action="">
                            <button class="btn btn-success mb-5" type="submit" id="agregar" style="margin-left:75rem">NUEVO</button>
                        </form> -->
                    </div>
                    <!--Table-->
                    
                    <div class="table-responsive-sm table-striped ">
                        <table class="table">
                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th class="th-lg text-center">
                                        <a>NOMBRE
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
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
                                            <button type="submit" onclick="return confirm('¿Desea eliminar la quincena?')" id= "borrar" class="btn btn-danger btn-rounded mb-4"> BORRAR
                                            </button>

                                           <!-- <button class="btn btn-danger" type="submit" id="borrar">Borrar</button>-->
                                        </form>
                                   
                                    </td>
                                    <!--BOTON MODIFICAR NO FUNCIONA LA VISTA MODIFPRODUCTO, SI TOMA EL ID DEL PREODUCTO-------->
                                    <td>
                                         <a id="modificar" class="btn btn-primary btn-rounded mb-4" href="/modif_quincena/{{$quincena->id}}" role="button" >Modificar </a>

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
        </div>
    </div>
</div>
<!--Section: Content-->
@endsection