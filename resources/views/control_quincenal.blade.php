@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-ms-12 col-md-12 col-lg-12">
            <div class="mx-auto">
                <div class="px-4">
                    <div class="table-wrapper">
                        <h1 class="text-center">CONTROL QUINCENAL DE FACTURACION Y PAGO</h1>
                        <a id="agregar" class="btn primary-color-dark mb-5 rounded" href="{{ url('/nuevo_control') }}" role="button" style="margin-left:72rem;color:white">NUEVO </a>

                        <!--BOTON AGREGAR PRODUCTO-------------------
                        
                        <form method="POST" action="">
                            <button class="btn btn-success mb-5" type="submit" id="agregar" style="margin-left:75rem">NUEVO</button>
                        </form> -->
                    </div>

                  
                        <form class="form-inline md-form mr-auto mb-4 float-right" action="">
                        <select name="buscarporcliente" class="form-control mr-sm-2" id="exampleFormControlSelect1">
                        <option>Cliente</option>
                                @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                    
                        </select>
                        <select name="buscarporquincena" class="form-control mr-sm-2" id="exampleFormControlSelect1">
                        <option>Quincena</option>
                        @foreach($quincenas as $quincena)
                        <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                        @endforeach
                        </select>

                        <button class="btn aqua-gradient btn-rounded btn-md" type="submit">Buscar</button>
                        <a class="fas fa-sync-alt" role="button" href=  {{ url('/control_quincenal') }}  style="cursor:pointer" title="refrescar" name="Refrescar" >  Refrescar</a>

                        </form>

                   

<!--<nav class="navbar navbar-light float-right">
    <form class="form-inline md-form mr-auto mb-4" action="">
 <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">
      <option>Buscar por ...</option>
      <option>id_quincena</option>
      <option>id_cliente</option>
      <option>num_factura</option>
      <option>toneladas</option>
    </select>
    <input name="buscarpor" class="form-control mr-sm-2" type="text" placeholder="..." aria-label="Search">

  <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Buscar</button>

    </form>
   <a class="fas fa-undo" role="button" href=  {{ url('/control_quincenal') }} style='margin-left:5rem' style="cursor:pointer",name="Regresar" >  Refrescar</a>

</nav>-->
<!-- <form class="form-inline md-form mr-auto mb-4 float-md-right">
  <input name="buscarpor" class="form-control mr-sm-2" type="text" placeholder="Buscar por cliente" aria-label="Search">
  <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Buscar</button>
</form> -->



                    <!--Table-->
                    <!--<table class="table-striped w-auto mx-auto">-->
                        <table class="table table-hover">
                            <!--Table head-->
                            <thead>
                                <tr>
                                    <!--<th>
                                        <input class="form-check-input" type="checkbox" id="checkbox">
                                        <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
                                    </th>-->
                                    <th class="th-lg text-center">
                                        <a>CLIENTE
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>QUINCENA
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>Num. FACTURA
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th class="th-lg text-center" hidden="true">
                                        <a>IMPORTE
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>MONTO COBRADO
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th class="th-lg text-center" hidden="true">
                                        <a>GASTOS BANCARIOS
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th class="th-lg text-center" hidden="true">
                                        <a>DISPONIBLE
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>TOTAL PAGO
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th class="th-lg text-center" hidden="true">
                                        <a>NETO QCNA
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th class="th-lg text-center">
                                        <a>COSTO TN
                                            <!--<i class="fas fa-sort ml-1"></i>-->
                                        </a>
                                    </th>
                                    <th colspan=2 class="text-center">
                                        <a>ACCION
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>

                                @foreach ($controles as $control)
                                <tr>


                                    <!--<th scope="row">
                                        <input class="form-check-input" type="checkbox" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1" class="label-table"></label>
                                    </th>-->
                                    <?php $disponible = $control->importe - ($control->retencion + $control->gasto_bancario); ?>
                                    <?php $totalPago = $control->pago_personal + $control->pago_transporte; ?>

                                    <td class="text-center"> {{$control->cliente->nombre}}</td>

                                    <td class="text-center"> {{$control->quincena->nombre}}</td>
                                    <td class="text-center"> {{$control->num_factura}}</td>
                                    <td class="text-center" hidden="true">$ {{$control->importe}}</td>
                                    <td class="text-center">$ {{$control->monto_cobrado}}</td>
                                    <td class="text-center" hidden="true">$ {{$control->gasto_bancario}}</td>
                                    <td class="text-center" hidden="true">$ {{$disponible}}</td>
                                    <td class="text-center">$ {{$totalPago}}</td>
                                    <td class="text-center" hidden="true">$ {{$disponible - $totalPago}}</td>
                                    <td class="text-center">$ {{($disponible - $totalPago)/$control->toneladas}}</td>

                                    <td>
                                        <form method="POST" action="{{ url('/borrar_control/'.$control->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('¿Desea eliminar el control quincenal?')" id="borrar" class="btn peach-gradient mb-1 btn-sm m-0 text-center"> BORRAR
                                            </button>

                                            <!--<button class="btn btn-danger" type="submit" id="borrar">Borrar</button>-->
                                        </form>
                                        <!-- <form method="POST" action="">

                                        <button class="btn btn-danger btn-rounded mb-4" type="submit" id="borrar">Borrar</button>
                                    </form> -->
                                    </td>
                                    <!--BOTON MODIFICAR NO FUNCIONA LA VISTA MODIFPRODUCTO, SI TOMA EL ID DEL PREODUCTO------
                                <td>
                                     <a id="modificar" class="btn btn-primary btn-rounded mb-4" href="/modif_control/{{$control->id}}" role="button" >Modificar </a>-->

                                    <!-- <form method="POST" action="">
                                        <button class="btn btn-primary btn-rounded mb-4" type="submit" id="borrar">Modifica</button>
                                    </form>
                                </td> -->

                                    <td>
                                        <form method="PUT" action="/modal_control/{{ $control->id }}">
                                            @csrf
                                            {{method_field('PUT')}}
                                            <p href="/modal_control/{{ $control->id }}" class="btn blue-gradient mb-1 btn-sm m-0 text-center" data-toggle="modal" data-target="#modal_control{{ $control->id }}" form method="POST" action="/modal_control/{{$control->id}}">VER</p>
                                            @csrf
                                            {{method_field('PUT')}}
                                            @include('modal_control')
                                        </form>
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
    </div>
</div>
<!--Section: Content-->
{{ $controles->appends($_GET)->links() }}

@endsection