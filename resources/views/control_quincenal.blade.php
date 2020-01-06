@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-ms-12 col-md-12 col-lg-12">
            <div class="mx-auto">
                <div class="px-4">
                    <div class="table-wrapper">
                        <h1 class="text-center">CONTROL QUINCENAL DE FACTURACION Y PAGO</h1>
                        <!--BOTON AGREGAR PRODUCTO--------------------->
                        <form method="POST" action="">
                            <button class="btn btn-success mb-5" type="submit" id="agregar" style="margin-left:75rem">NUEVO</button>
                        </form>
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
                                    <a>QUINCENA
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>Num. FACTURA
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>IMPORTE
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>MONTO COBRADO
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>GASTOS BANCARIOS
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>DISPONIBLE
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>TOTAL PAGO
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>NETO QCNA
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>COSTO TN
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>

                                <th class="th-lg text-center">
                                    <a>BORRAR
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>MODIFICAR
                                        <!--<i class="fas fa-sort ml-1"></i>-->
                                    </a>
                                </th>
                                <th class="th-lg text-center">
                                    <a>VER/IMP.
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
                                <td> {{$control->quincena}}</td>
                                <td>$ {{$control->num_factura}}</td>
                                <td>$ {{$control->importe}}</td>
                                <td>$ {{$control->monto_cobrado}}</td>
                                <td>$ {{$control->gasto_bancario}}</td>
                                <td>$ {{$disponible}}</td>
                                <td>$ {{$totalPago}}</td>
                                <td>$ {{$disponible - $totalPago}}</td>
                                <td>$ {{($disponible - $totalPago)/$control->toneladas}}</td>

                                <td class="text-center"></td>
                                <td>
                                    <form method="POST" action="">

                                        <button class="btn btn-danger btn-rounded mb-4" type="submit" id="borrar">Borrar</button>
                                    </form>
                                </td>
                                <!--BOTON MODIFICAR NO FUNCIONA LA VISTA MODIFPRODUCTO, SI TOMA EL ID DEL PREODUCTO-------->
                                <td>
                                    <form method="POST" action="">
                                        <button class="btn btn-primary btn-rounded mb-4" type="submit" id="borrar">Modifica</button>
                                    </form>
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
                                    <h4 class="modal-title w-100 font-weight-bold">CONTROL {{$control->quincena}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-book prefix grey-text"></i>
                                        <input type="text" id="orangeForm-name" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-name">Numero Factura {{$control->num_factura}}</label>
                                    </div>
                                    <div class="md-form mb-5">
                                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                                        <input type="text" id="orangeForm-email" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-email">Importe Factura  {{$control->importe}}</label>
                                    </div>

                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign prefix grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Retenciones  {{$control->retencion}}</label>
                                    </div>

                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Monto Cobrado   {{$control->monto_cobrado}}</label>
                                    </div>

                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Gastos Bancarios   {{$control->gasto_bancario}}</label>
                                    </div>

                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Libre Disponibilidad  {{$disponible}}</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Pago Cosecha   {{$control->pago_personal}}</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">Pago Transporte   {{$control->pago_transporte}}</label>
                                    </div>
                                    <div class="md-form mb-4">
                                        <i class="fas fa-dollar-sign grey-text"></i>
                                        <input type="text" id="orangeForm-pass" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="orangeForm-pass">SALDO QUINCENA  {{$disponible - $totalPago}}</label>
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