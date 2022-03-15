@extends('layouts.app1')

<head>
    <title>Control Facturacion</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nova.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/formCss.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/54be8f18700cc4e0368b4568.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="../js/validacion_nuevo_control.js"></script>
    <style>
        .top-buffer {
            margin-top: 20px;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1">
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
    }

    .form-label {
        font-family: "Verdana", sans-serif;
    }

    .form-label.form-label-auto {
        display: inline-block;
        float: left;
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
        font-size: 12pxpx
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

<div class="row col-md-10 col-lg-10 mt-0" id="contenido">


    <div role="main" class="form-all">
        <ul class="form-section page-section">
            <li id="cid_1" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-defecto">
                    <div class="header-text httal htvam">
                        <h2 id="header_1" class="form-header" data-component="header">
                            CONTROL QCNAL DE FACTURACION Y PAGO
                        </h2>
                    </div>
                </div>
            </li>
            <form method="POST" action="{{ url('/nuevo_control_factura') }}" onsubmit="return validar_control(this)" name="formulario" id="formulario">

                @csrf
                <li class="form-line jf-required" data-type="control_datetime" id="id_13">
                    <label class="form-label form-label-left form-label-auto" id="label_13" for="day_13">
                        FECHA
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_13" class="form-input">
                        <input id="fecha" type="date" name="fecha" value="{{ old('fecha') }}" aria-label=" name" class="form-control" placeholder="dd/mm/aaaa">
                    </div>
                </li>

                <li class="form-line" data-type="control_fullname" id="id_10">
                    <label class="form-label form-label-left form-label-auto" id="label_10" for="first_10">
                        QUINCENA
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_3" class="form-input jf-required">
                        <select class="form-dropdown validate[required]" id="id_quincena" name="quincena_id" style="width:150px" data-component="dropdown" value="{ old('$quincena->nombre')" required="" aria-labelledby="label_3">
                            <option selected>Elegir Quincena</option>
                            @foreach($quincenas as $quincena)
                            <option value="{{$quincena->id}}">{{$quincena->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </li>

                <li class="form-line " data-type="control_matrix" id="id_7">

                    <class class="form-label form-label-top" id="label_7" for="input_7"> DETALLE FACTURACION Y PAGOS
                        <button type="button" class="btn-sm btn-danger" style="float: right; margin-top: -6px;" onclick="eliminarFila()">Eliminar Fila</button>
                        <button id="btnadd" class="btn-sm btn-primary" style="float: right; margin-top: -6px; margin-right: 3px;">Agregar Factura</button>
                    </class>

                    <table id="tblfact" summary="" role="presentation" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                        <thead>
                            <tr class="form-matrix-tr form-matrix-header-tr">
                                <!--<th class="form-matrix-th" style="border:none">
                                                &nbsp;
                                            </th>-->
                                <th class="form-matrix-headers form-matrix-column-headers form-matrix-column"><b>Nº</b></th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_0">
                                    <label> <b> CLIENTE </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_0">
                                    <label> <b> EMP. QUE FACTURA </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_1">
                                    <label> <b> Nº FACTURA </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_2">
                                    <label> <b> IMP. FACT. S/IVA </b> </label>
                                </th>
                            </tr>
                        </thead>
                        <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_7 label_7_row_0">
                            <!---<th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                <label id="label_7_row_0"> 1 </label>
                                            </th>-->
                            <td class="form-matrix-values">1</td>
                            <td class="form-matrix-values">
                                <select class="form-dropdown" id="id_cliente" name="id_cliente[]" style="width:150px" data-component="dropdown" value="{{ old('$cliente->nombre') }}" required="" aria-labelledby="label_3">
                                    <option selected>Elegir Cliente</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="form-matrix-values">
                                <select class="form-dropdown" id="id_empresa" name="id_empresa[]" style="width:150px" data-component="dropdown" value="{{ old('$empresa->razon_social') }}" required="" aria-labelledby="label_3">
                                    <option selected>Elegir Empresa</option>
                                    @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}">{{$empresa->razon_social}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="form-matrix-values">
                                <input type="double" id="num_factura" class="form-textbox" size="15" name="num_factura[]" style="width:100%;box-sizing:border-box" value="{{ old('num_factura') }}" aria-labelledby="label_7_col_1">
                            </td>
                            <td class="form-matrix-values">
                                <input type="double" id="importe" class="form-textbox" size="15" name="importe[]" style="width:100%;box-sizing:border-box" value="{{ old('importe') }}" aria-labelledby="label_7_col_2">
                            </td>
                        </tr>
                    </table>

                    &nbsp;
                    <table id="tblfact1" summary="" role="presentation" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                        <tbody>
                            <tr class="form-matrix-tr form-matrix-header-tr">
                                <!--<th class="form-matrix-th" style="border:none">
                                                &nbsp;
                                            </th>-->
                                <th class="form-matrix-headers form-matrix-column-headers form-matrix-column"><b>Nº</b></th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_3">
                                    <label id="label_7_col_4"> <b>IMP. COBRADO</b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_4">
                                    <label id="label_7_col_5"> <b> IMP. A PAGAR </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_5">
                                    <label id="label_7_col_6"> <b> IMP. F-931 </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_7"> <b> TOTAL A PAGAR </b> </label>
                                </th>
                            </tr>
                            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_7 label_7_row_0">
                                <!---<th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                <label id="label_7_row_0"> 1 </label>
                                            </th>-->
                                <td class="form-matrix-values">1</td>
                                <td class="form-matrix-values">
                                    <input type="double" id="monto_cobrado" class="form-textbox" size="20" name="monto_cobrado[]" style="width:100%;box-sizing:border-box" value="{{ old('monto_cobrado') }}" aria-labelledby="label_7_col_3">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="pago_personal" class="form-textbox" size="20" name="pago_personal[]" style="width:100%;box-sizing:border-box" value="{{ old('pago_personal') }}" aria-labelledby="label_7_col_4">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="nueve_treintayuno" class="form-textbox" size="20" name="nueve_treintayuno[]" style="width:100%;box-sizing:border-box" value="{{ old('nueve_treintayuno') }}" aria-labelledby="label_7_col_5">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="importe_a_pagar" class="form-textbox" size="20" name="importe_a_pagar[]" style="width:100%;box-sizing:border-box" value="{{ old('importe_a_pagar') }}" aria-labelledby="label_7_col_6">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    &nbsp;
                    <table id="tblfact2" summary="" role="presentation" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                        <tbody>
                            <tr class="form-matrix-tr form-matrix-header-tr">
                                <!--<th class="form-matrix-th" style="border:none">
                                                    &nbsp;
                                                </th>-->
                                <th class="form-matrix-headers form-matrix-column-headers form-matrix-column"><b>Nº</b></th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_8"> <b> CANTIDAD COS. </b></label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_9"> <b> CANTIDAD JOR. </b></label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_10"> <b>IMPORTE JOR. </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_11"> <b> CAPATACES </b></label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_12"> <b> IMP.CAPATACES </b></label>
                                </th>
                            </tr>
                            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_7 label_7_row_0">
                                <!--<th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                    <label id="label_7_row_1"> 1 </label>
                                                </th>-->
                                <td class="form-matrix-values">1</td>
                                <td class="form-matrix-values">
                                    <input type="double" id="cantidad_cosecheros" class="form-textbox" size="20" name="cantidad_cosecheros[]" style="width:100%;box-sizing:border-box" value="{{ old('cantidad_cosecheros') }}" aria-labelledby="label_7_col_2">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="cantidad_jornales" class="form-textbox" size="20" name="cantidad_jornales[]" style="width:100%;box-sizing:border-box" value="{{ old('cantidad_jornales') }}" aria-labelledby="label_7_col_3">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="importe_jornales" class="form-textbox" size="20" name="importe_jornales[]" style="width:100%;box-sizing:border-box" value="{{ old('importe_jornales') }}" aria-labelledby="label_7_col_4">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="cantidad_capataces" class="form-textbox" size="20" name="cantidad_capataces[]" style="width:100%;box-sizing:border-box" value="{{ old('cantidad_capataces') }}" aria-labelledby="label_7_col_5">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="importe_capataces" class="form-textbox" size="20" name="importe_capataces[]" style="width:100%;box-sizing:border-box" value="{{ old('importe_capataces') }}" aria-labelledby="label_7_col_6">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    &nbsp;
                    <table id="tblfact3" summary="" role="presentation" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                        <tbody>
                            <tr class="form-matrix-tr form-matrix-header-tr">
                                <!--<th class="form-matrix-th" style="border:none">
                                                        &nbsp;
                                                    </th>-->
                                <th class="form-matrix-headers form-matrix-column-headers form-matrix-column"><b>Nº</b></th>
                                <th scope=" col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_13"> <b> CANT.COLECT. </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_14"> <b> IMP. COLECT. </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_15"> <b> MALETAS </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_16"> <b> BINES </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_17"> <b> HORAS </b> </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
                                    <label id="label_7_col_18"> <b> PROMEDIO </b> </label>
                                </th>
                            </tr>
                            <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_7 label_7_row_0">
                                <!--<th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                                        <label id="label_7_row_3"> 1 </label>
                                                    </th>-->
                                <td class="form-matrix-values">1</td>
                                <td class="form-matrix-values">
                                    <input type="double" id="cantidad_colectivos" class="form-textbox" size="15" name="cantidad_colectivos[]" style="width:100%;box-sizing:border-box" value="{{ old('cantidad_colectivos') }}" aria-labelledby="label_7_col_0">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="importe_colectivos" class="form-textbox" size="15" name="importe_colectivos[]" style="width:100%;box-sizing:border-box" value="{{ old('importe_colectivos') }}" aria-labelledby="label_7_col_1">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="cantidad_maletas" class="form-textbox" size="15" name="cantidad_maletas[]" style="width:100%;box-sizing:border-box" value="{{ old('cantidad_maletas') }}" aria-labelledby="label_7_col_0">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="cantidad_bines" class="form-textbox" size="15" name="cantidad_bines[]" style="width:100%;box-sizing:border-box" value="{{ old('cantidad_bines') }}" aria-labelledby="label_7_col_1">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="cantidad_horas" class="form-textbox" size="15" name="cantidad_horas[]" style="width:100%;box-sizing:border-box" value="{{ old('cantidad_horas') }}" aria-labelledby="label_7_col_2">
                                </td>
                                <td class="form-matrix-values">
                                    <input type="double" id="promedio" class="form-textbox" size="15" name="promedio[]" style="width:100%;box-sizing:border-box" value="{{ old('promedio') }}" aria-labelledby="label_7_col_2">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </li>

                
                <script type="text/javascript">
                    var count = 1;

                    $(function() {

                        /* jQuery("#miform").validationEngine({
                             promptPosition: "centerRight:0,-5"
                         });*/

                        $(document).on("click", "#btnadd", function(event) {
                            count++;
                            //document.getElementById("tblfact").insertRow(-1).innerHTML = '<tr><td>' + count + '<td class="form-matrix-values"><select class="form-dropdown validate[required]" id="input_3" name="q3_sucursal3" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_3"><<option value=""></option><option value="Argenti Lemon S.A."> Argenti Lemon S.A. </option><option value="Dampas S.A.">Dampas S.A. </option><option value="Consorfrut"> Consorfrut </option><option value="Santa Isabel">Santa Isabel </option><option value="CLK"> CLK </option></td><td class="form-matrix-values"><select class="form-dropdown validate[required]" id="input_3" name="q3_sucursal3" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_3"><<option value=""></option><option value="Limas y Limones"> Limas y Limones </option><option value="AZ Agricolas">AZ Agricolas </option><option value="Raccolta"> Raccolta </option><option value="ZAL SAS">ZAL SAS </option></td><td class="form-matrix-values"><input type="text" id="input_7_0_1" class="form-textbox" size="15" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_1"><td class="form-matrix-values"><input type="text" id="input_7_0_2" class="form-textbox" size="15" name="q7_pedido7[1][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_2"></td>';
                            document.getElementById("tblfact").insertRow(-1).innerHTML = '<tr><td class="form-matrix-values">' + count + '<td class="form-matrix-values"><select class="form-dropdown" id="id_cliente" name="id_cliente[]" style="width:150px" data-component="dropdown" value="id_cliente" required="" aria-labelledby="label_3"><option selected>Elegir Cliente</option>@foreach($clientes as $cliente)<option value="{{$cliente->id}}">{{$cliente->nombre}}</option>@endforeach <td class="form-matrix-values"><select class="form-dropdown" id="id_empresa" name="id_empresa[]" style="width:150px" data-component="dropdown" value="" required="" aria-labelledby="label_3"><option selected>Elegir Empresa</option>@foreach($empresas as $empresa)<option value="{{$empresa->id}}">{{$empresa->razon_social}}</option>@endforeach><td class="form-matrix-values"><input type="text" id="num_factura" class="form-textbox" size="20" name="num_factura[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3"> </td><td class="form-matrix-values"><input type="text" id="importe" class="form-textbox" size="20" name="importe[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3"> </td>';
                            document.getElementById("tblfact1").insertRow(-1).innerHTML = '<tr><td class="form-matrix-values">' + count + '<td class="form-matrix-values"><input type="text" id="monto_cobrado" class="form-textbox" size="20" name="monto_cobrado[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_4" class="form-textbox" size="20" name="pago_personal[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_4"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_5" class="form-textbox" size="20" name="nueve_treintayuno[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_5"></td><td class="form-matrix-values"><input type="text" id="input_7_0_6" class="form-textbox" size="20" name="importe_a_pagar[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td></select></td>';
                            document.getElementById("tblfact2").insertRow(-1).innerHTML = '<tr><td class="form-matrix-values">' + count + '<td class="form-matrix-values"><input type="text" id="cantidad_cosecheros" class="form-textbox" size="20" name="cantidad_cosecheros[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3"> </td><td class="form-matrix-values"><input type="text" id="cantidad_jornales" class="form-textbox" size="20" name="cantidad_jornales[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_4"> </td><td class="form-matrix-values"><input type="text" id="importe_jornales" class="form-textbox" size="20" name="importe_jornales[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_5"></td><td class="form-matrix-values"><input type="text" id="cantidad_capataces" class="form-textbox" size="20" name="cantidad_capataces[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td><td class="form-matrix-values"><input type="text" id="importe_capataces" class="form-textbox" size="20" name="importe_capataces[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td>';
                            document.getElementById("tblfact3").insertRow(-1).innerHTML = '<tr><td class="form-matrix-values">' + count + '<td class="form-matrix-values"><input type="text" id="cantidad_colectivos" class="form-textbox" size="20" name="cantidad_colectivos[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3"> </td><td class="form-matrix-values"><input type="text" id="importe_colectivos" class="form-textbox" size="20" name="importe_colectivos[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_4"> </td><td class="form-matrix-values"><input type="text" id="cantidad_maletas" class="form-textbox" size="20" name="cantidad_maletas[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_5"></td><td class="form-matrix-values"><input type="text" id="cantidad_bines" class="form-textbox" size="20" name="cantidad_bines[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td><td class="form-matrix-values"><input type="text" id="cantidad_horas" class="form-textbox" size="20" name="cantidad_horas[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td><td class="form-matrix-values"><input type="text" id="promedio" class="form-textbox" size="20" name="promedio[]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td>';
                            event.preventDefault();
                        });

                    });

                    function eliminarFila() {

                        var table = document.getElementById("tblfact");
                        var table1 = document.getElementById("tblfact1");
                        var table2 = document.getElementById("tblfact2");
                        var table3 = document.getElementById("tblfact3");
                        var rowCount = table.rows.length;
                        var rowCount1 = table1.rows.length;
                        var rowCount2 = table1.rows.length;
                        var rowCount3 = table1.rows.length;
                        //console.log(rowCount);
                        //console.log(rowCount1);
                        if (rowCount <= 2)
                            // alert('No se puede eliminar la primera fila');
                            swal("Atención", "No hay mas filas para eliminar.", "warning");
                        else
                            table.deleteRow(rowCount - 1) & table1.deleteRow(rowCount - 1) & table2.deleteRow(rowCount - 1) & table3.deleteRow(rowCount - 1) & count - 1;
                        count = 1;
                    }
                </script>

                <li class="form-line" data-type="control_textarea" id="id_14">
                    <label class="form-label form-label-left form-label-auto" id="label_14" for="input_14"> OBSERVACIONES </label>
                    <div id="cid_14" class="form-input">
                        <textarea id="observaciones" class="form-textarea" name="observaciones" cols="40" rows="6" data-component="textarea" aria-labelledby="label_14"></textarea>
                    </div>
                </li>


                <div class="row justify-content-center mt-1">
                    <!--<div class="form-group col-md-10 col-form-label text-center">-->
                    <div>
                        <button type="submit" class="btn btn-success">GRABAR</button>
                        <a class="btn btn-primary" href="{{ ('control_quincenal') }}"> Regresar</a>
                    </div>
                </div>
            </form>
    </div>
</div>


@endsection