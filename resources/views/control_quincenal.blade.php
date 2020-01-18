@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-ms-12 col-md-12 col-lg-12">
            <div class="mx-auto">
                <div class="px-4">
                    <div class="table-wrapper">
                        <h1 class="text-center">CONTROL QUINCENAL DE FACTURACION Y PAGO</h1>
                         <a id="agregar" class="btn btn-success mb-5 rounded" href="{{ url('/nuevo_control') }}" role="button" style="margin-left:72rem" >NUEVO </a>

                        <!--BOTON AGREGAR PRODUCTO-------------------
                        
                        <form method="POST" action="">
                            <button class="btn btn-success mb-5" type="submit" id="agregar" style="margin-left:75rem">NUEVO</button>
                        </form> -->
                    </div>
                    <!--Table-->
                    <table class="table-responsive-sm table-striped w-auto mx-auto">

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
                                <?php $disponible = $control->importe-($control->retencion + $control->gasto_bancario); ?>
                                <?php $totalPago = $control->pago_personal + $control->pago_transporte; ?>
                                
                                <td  class="text-center" > {{$control->cliente->nombre}}</td>

                                <td  class="text-center"> {{$control->quincena->nombre}}</td>
                                <td class="text-center"> {{$control->num_factura}}</td>
                                <td class="text-center" hidden="true">$ {{$control->importe}}</td>
                                <td class="text-center">$ {{$control->monto_cobrado}}</td>
                                <td class="text-center" hidden="true">$ {{$control->gasto_bancario}}</td>
                                <td class="text-center" hidden="true">$ {{$disponible}}</td>
                                <td class="text-center">$ {{$totalPago}}</td>
                                <td class="text-center" hidden="true">$ {{$disponible - $totalPago}}</td>
                                <td class="text-center">$ {{($disponible - $totalPago)/$control->toneladas}}</td>

                                <td class="text-center"></td>
                                <td>
                                       <form method="POST" action="{{ url('/borrar_control/'.$control->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('¿Desea eliminar el control quincenal?')" id= "borrar" class="btn btn-danger btn-rounded mb-4"> BORRAR
                                            </button>

                                           <!--<button class="btn btn-danger" type="submit" id="borrar">Borrar</button>-->
                                        </form> 
                                   <!-- <form method="POST" action="">

                                        <button class="btn btn-danger btn-rounded mb-4" type="submit" id="borrar">Borrar</button>
                                    </form> -->
                                </td>
                                <!--BOTON MODIFICAR NO FUNCIONA LA VISTA MODIFPRODUCTO, SI TOMA EL ID DEL PREODUCTO-------->
                                <td>
                                     <a id="modificar" class="btn btn-primary btn-rounded mb-4" href="/modif_control/{{$control->id}}" role="button" >Modificar </a>

                                  <!-- <form method="POST" action="">
                                        <button class="btn btn-primary btn-rounded mb-4" type="submit" id="borrar">Modifica</button>
                                    </form> -->
                                </td>
                                <td>
                                    <a href="/modal_control/{{ $control->id }}" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modal_control{{ $control->id }}">Ver/Imp.
                                        @include('modal_control')
                                    </a>
                                </td>
                                <td>
                                    <a href="{{action('controlController@downloadPDF', $control->id)}}" class="far fa-file-pdf fa-3x"   >
                                        
                                    </a>
                                </td>
                                 <td>
                                    <a href="{{action('controlController@verPDF', $control->id)}}" class="btn btn-default btn-rounded mb-4 btn-success"  >Ver PDF

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
@endsection