@extends('layouts.app-modif-control')

@section('content')


<head>
    <title>Detalle Facturacion</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nova.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/formCss.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/54be8f18700cc4e0368b4568.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="../js/validacion_modif_control.js"></script>
    <script src="../js/borra_factura_modif_control.js"></script>
    <style>
        .top-buffer {
            margin-top: 20px;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<style type="text/css">
    .form-label-left {
        width: 150px;
    }

    .form-line {
        padding-top: 12px;
        padding-bottom: 12px;
    }

    .form-label-right {
        width: 150px;
    }

    body {
        margin: 0;
        padding: 0;
        background: rgb(153, 153, 153);
    }

    .form-all {
        margin: 0px auto;
        padding-top: 0px;
        width: 690px;
        color: #555 !important;
        font-family: 'Coda';
        font-size: 14px;
    }
</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
    /*PREFERENCES STYLE*/

    .form-all {
        font-family: "Verdana", sans-serif;
    }

    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
        font-family: "Verdana", sans-serif;
    }

    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
        font-family: "Verdana", sans-serif;
    }

    .form-header-group {
        font-family: "Verdana", sans-serif;
        background-color: silver;
    }

    .form-label {
        font-family: "Verdana", sans-serif;
    }

    .form-label.form-label-auto {
        display: inline-block;
        /*float: left;*/
        text-align: left;
    }

    .form-line {
        margin-top: 12px;
        margin-bottom: 12px;
    }

    .form-all {
        max-width: 650px;
        width: 100%;
    }

    .form-label.form-label-left,
    .form-label.form-label-right,
    .form-label.form-label-left.form-label-auto,
    .form-label.form-label-right.form-label-auto {
        width: 180px;
    }

    .form-all {
        font-size: 120pxpx
    }

    .form-all .qq-upload-button,
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
        font-size: 12pxpx
    }

    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
        font-size: 12pxpx
    }

    .supernova .form-all,
    .form-all {
        /*background-color: rgb(153, 153, 153);*/
        background-color: silver;
    }

    .form-all {
        color: black;
    }

    .form-header-group .form-header {
        color: black;
    }

    .form-header-group .form-subHeader {
        color: black;
    }

    .form-label-top,
    .form-label-left,
    .form-label-right,
    .form-html,
    .form-checkbox-item label,
    .form-radio-item label {
        color: black;
    }

    .form-sub-label {
        color: 1a1a25;
    }

    .supernova {
        background-color: undefined;
    }

    .supernova body {
        background: transparent;
    }

    .form-textbox,
    .form-textarea,
    .form-dropdown,
    .form-radio-other-input,
    .form-checkbox-other-input,
    .form-captcha input,
    .form-spinner input {
        background-color: undefined;
    }

    .supernova {
        background-image: none;
    }

    #stage {
        background-image: none;
    }

    .form-all {
        /*background-image: url("//www.jotform.com/images/brushed.png");*/
        background-repeat: repeat;
        background-attachment: scroll;
        background-position: center top;
    }

    .ie-8 .form-all:before {
        display: none;
    }

    .ie-8 {
        margin-top: auto;
        margin-top: initial;
    }
</style>
@section('content')

<div class="container-fluid text-center">
    <h2 class="form-label-top text-center" data-type="control_matrix"> DETALLE FACTURACION Y COSECHA</h2>
</div>

@foreach ($control as $object)
@endforeach


<div class="container-fluid">
    <form style="padding-left: 5rem;">
        <li class="form-line jf-required" data-type="control_matrix" id="id_7">
            <class class="form-label-top" id="label_7" for="input_7" style="width:fit-content">
                <div>
                    <label class="form-label" style="margin-bottom: 1rem; width:fit-content">
                        FECHA FACTURA: {{$object->fecha}}
                    </label>
                </div>
                <label class="form-label" style="margin-bottom: 1rem; width:fit-content">
                    PERIODO: {{$object->quincena->nombre}}
                </label>

                <table id="tblfact" summary="" role="presentation" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                    <tbody>
                        <tr class="form-matrix-tr form-matrix-header-tr">
                            <th class="form-matrix-headers form-matrix-column-headers form-matrix-column" style="font-size: 12px;"><b>Nº</b>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix" style="font-size: 12px;">
                                <label> <b> CLIENTE </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix" style=" font-size: 12px;"">
                                    <label> <b> EMP. QUE FACTURA </b> </label>
                                </th>
                                <th scope=" col" class="form-matrix-headers form-matrix-column-headers form-matrix text-truncate" style="font-size: 12px;">
                                <label> <b> Nº FACTURA </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix text-truncate" style="font-size: 12px;">
                                <label> <b> IMP. FACT. S/IVA </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix text-truncate" style="font-size: 12px;">
                                <label> <b> IVA </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix text-truncate" style="font-size: 12px;">
                                <label> <b> ORDEN DE PAGO </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_5 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_6"> <b> ANTICIPO </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_7"> <b> SALDO </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_3 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_4"> <b>IMP. COBRADO</b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_4 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_5"> <b> IMP. A PAGAR </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_5 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_6"> <b> IMP. F-931 </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_7"> <b> TOTAL A PAGAR </b> </label>
                            </th>
                        </tr>


                        @foreach ($control as $object)
                        <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_7 label_7_row_0">

                            <td class="form-matrix-values">{{ $loop->iteration }}</td>
                            @php
                            $max_iteration = 0;
                            @endphp

                            @foreach ($control as $cont)
                            @php
                            $max_iteration = max($max_iteration, $loop->iteration);
                            @endphp
                            @endforeach
                            <td class="form-matrix-values">
                                <option selected>{{$object->cliente->nombre}}</option>
                            </td>
                            <td class="form-matrix-values">
                                <option selected>{{$object->empresa->razon_social}}</option>
                            </td>
                            <td class="form-matrix-values">
                                {{$object->num_factura}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->importe,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->iva,2,',','.') }}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->importe,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->anticipo,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->saldo,2,',','.') }}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->monto_cobrado,2,',','.') }}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->pago_personal,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->nueve_treintayuno,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->importe_a_pagar,2,',','.')}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </class>
        </li>

        <li class="form-line jf-required" data-type="control_matrix" id="id_7">
            <class class="form-label-top" id="label_7" for="input_7" style="width:fit-content">
                <div><label class="form-label" style="margin-bottom: 1rem; width:fit-content">DATOS COSECHA: {{$object->quincena->nombre}}</label></div>
                <table id="tblfact2" summary="" role="presentation" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                    <tbody>
                        <tr class="form-matrix-tr form-matrix-header-tr">
                            <th class="form-matrix-headers form-matrix-column-headers form-matrix-column" style="font-size: 12px;"><b>Nº</b>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style=" font-size: 12px;">
                                <label id="label_7_col_8"> <b> CANTIDAD COS. </b></label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_10"> <b>IMPORTE COS. </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_9"> <b> CANTIDAD JOR. </b></label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_10"> <b>IMPORTE JOR. </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_11"> <b> CAPATACES </b></label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_12"> <b> IMP.CAPATACES </b></label>
                            </th>
                            <th scope=" col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_13"> <b> CANT.COLECT. </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_14"> <b> IMP. COLECT. </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_15"> <b> MALETAS </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_16"> <b> BINES </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_16"> <b> TONELADAS </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_17"> <b> HORAS </b> </label>
                            </th>
                            <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6 text-truncate" style="font-size: 12px;">
                                <label id="label_7_col_18"> <b> PROMEDIO KILOS </b> </label>
                            </th>
                        </tr>
                        @foreach($control as $object)
                        <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_7 label_7_row_0">

                            <td class="form-matrix-values">{{ $loop->iteration }}</td>
                            @php
                            $max_iteration = 0;
                            @endphp

                            @foreach ($control as $cont)
                            @php
                            $max_iteration = max($max_iteration, $loop->iteration);
                            @endphp
                            @endforeach
                            <td class="form-matrix-values text-truncate">
                                {{number_format($object->cantidad_cosecheros,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->importe_cosecheros,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                {{number_format($object->cantidad_jornales,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->importe_jornales,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                {{number_format($object->cantidad_capataces,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->importe_capataces,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                {{number_format($object->cantidad_colectivos,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                $ {{number_format($object->importe_colectivos,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                {{number_format($object->cantidad_maletas,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                {{number_format($object->cantidad_bines,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                {{number_format($object->toneladas,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                {{number_format($object->cantidad_horas,2,',','.')}}
                            </td>
                            <td class="form-matrix-values text-truncate">
                                {{number_format($object->promedio,2,',','.')}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </class>
        </li>
    </form>
    <div style="padding-left: 12rem;">
        <li class="form-line" data-type="control_textarea" id="id_14">
            <label class="form-label form-label-left form-label-auto" id="label_14" for="input_14"> OBSERVACIONES </label>
            <div id="cid_14" class="form-input">
                <textarea id="observaciones" class="form-textarea" name="observacion" cols="60" rows="5" data-component="textarea" aria-labelledby="label_14"></textarea>
            </div>
        </li>
    </div>

    <div class="row justify-content-center">
        <div>
            <a class="btn btn-primary" href="{{ url('/resumen_control') }}"> Regresar</a>
            <a class="btn btn-danger" href="/../pdf_detalle_control/{{ $object->id_factura }}"> PDF</a>
        </div>
    </div>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection