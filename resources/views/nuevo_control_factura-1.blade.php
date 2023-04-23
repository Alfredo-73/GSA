@extends('layouts.app1'))
<title>Control Facturacion</title>
<link type="text/css" rel="stylesheet" href="{{ asset('css/nova.css')}}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/formCss.css')}}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/54be8f18700cc4e0368b4568.css')}}">

<!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-es.js"></script>

<style>
    .top-buffer {
        margin-top: 0px;
    }
</style>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1">-->

<style type="text/css">
    .form-label-left {
        width: 150px;
    }

    .form-line {
        padding-top: 0px;
        padding-bottom: 12px;
    }

    .form-label-right {
        width: 150px;
    }

    body,
    html {
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
        background-color: rgb(153, 153, 153);
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
        background-image: url("//www.jotform.com/images/brushed.png");
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

    /*PREFERENCES STYLE*/
    /*__INSPECT_SEPERATOR__*/
    /* Injected CSS Code */
</style>

<!--<script src="../js/prototype.forms.js" type="text/javascript"></script>
<script src="../js/jotform.forms.js" type="text/javascript"></script>
<script type="text/javascript">
    JotForm.init(function() {

        JotForm.calendarMonths = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembere", "Deciembre"];
        JotForm.calendarDays = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
        JotForm.calendarOther = {
            "today": "Hoy"
        };
        var languageOptions = document.querySelectorAll('#langList li');
        for (var langIndex = 0; langIndex < languageOptions.length; langIndex++) {
            languageOptions[langIndex].on('click', function(e) {
                setTimeout(function() {
                    JotForm.setCalendar("13", false, {
                        "days": {
                            "lunes": true,
                            "martes": true,
                            "miercoles": true,
                            "jueves": true,
                            "viernes": true,
                            "sabado": true,
                            "domingo": true
                        },
                        "future": true,
                        "past": true,
                        "custom": false,
                        "ranges": false,
                        "start": "",
                        "end": ""
                    });
                }, 0);
            });
        }
        JotForm.setCalendar("13", false, {
            "days": {
                "monday": true,
                "tuesday": true,
                "wednesday": true,
                "thursday": true,
                "friday": true,
                "saturday": true,
                "sunday": true
            },
            "future": true,
            "past": true,
            "custom": false,
            "ranges": false,
            "start": "",
            "end": ""
        });
        JotForm.formatDate({
            date: (new Date()),
            dateField: $("id_" + 13)
        });
        JotForm.displayLocalTime("hour_13", "min_13", "ampm_13", null, false);
        if (window.JotForm && JotForm.accessible) $('input_14').setAttribute('tabindex', 0);
        JotForm.initCaptcha('input_12');
        $('input_12_reload').observe('click', function() {
            JotForm.reloadCaptcha('input_12')
        })
        JotForm.newDefaultTheme = false;
        JotForm.extendsNewTheme = false;
        JotForm.newPaymentUIForNewCreatedForms = false;
        /*INIT-END*/
    });-->
</script>

<!--@section('content')-->

<body>
    <!--<div id="container ">
        <div class="row-fluid top-buffer">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <form id="miform" method="post" name="miform">
                    <table id="tblprod" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Codigo Producto</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="form-group col-lg-12">
                                        <input class="form-control validate[required]" name="prod[]" />
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <button id="btnadd" class="btn btn-primary">Agregar Nuevo</button>
                    <button id="btnsubmit" type="submit" class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            var count = 1;
            jQuery("#miform").validationEngine({
                promptPosition: "centerRight:0,-5"
            });

            $(document).on("click", "#btnadd", function(event) {
                count++;
                $('#tblprod tr:last').after('<tr><td>' + count + '</td><td><div class="form-group col-lg-12"><input class="form-control validate[required]" name="prod[]" /></div></td></tr>');
                event.preventDefault();
            });

            $("#miform").submit(function(event) {
                var frm = $(this);
                var formulario = $(this).serialize();

                if ($('#miform').validationEngine('validate')) {
                    $.post("guardar.php", formulario)
                        .done(function(data) {
                            alert(data);
                            $(frm)[0].reset();
                        })
                        .fail(function() {
                            alert("error no pude enviar los datos");
                        });
                }
                event.preventDefault();
            });

        });
    </script>-->
    <input type="hidden" id="JWTContainer" value="">
    <input type="hidden" id="cardinalOrderNumber" value="">
    <div role="main" class="form-all">
        <ul class="form-section page-section">
            <li id="cid_1" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-defecto">
                    <div class="header-text httal htvam">
                        <h2 id="header_1" class="form-header" data-component="header">
                            CONTROL QUINCENAL DE FACTURACION Y PAGO
                        </h2>
                        <!--<div id="subHeader_1" class="form-subHeader">
                            Formulario
                        </div>-->
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
                    <div id="cid_13" class="form-input jf-required">
                        <div data-wrapper-react="true" class="extended notLiteMode">
                            <span class="form-sub-label-container" style="vertical-align:top">

                                <input type="tel" class="currentDate form-textbox validate[required, limitDate]" id="fecha" name="fecha" size="2" data-maxlength="2" data-age="" maxlength="2" value="" required="" autocomplete="off" aria-labelledby="label_13 sublabel_13_day">
                                <span class="date-separate" aria-hidden="true">
                                    &nbsp;-
                                </span>
                                <label class="form-sub-label" for="day_13" id="sublabel_13_day" style="min-height:13px" aria-hidden="false"> Día </label>
                            </span>
                            <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="tel" class="form-textbox validate[required, limitDate]" id="month_13" name="q13_hagaClic13[month]" size="2" data-maxlength="2" data-age="" maxlength="2" value="" required="" autocomplete="off" aria-labelledby="label_13 sublabel_13_month">
                                <span class="date-separate" aria-hidden="true">
                                    &nbsp;-
                                </span>
                                <label class="form-sub-label" for="month_13" id="sublabel_13_month" style="min-height:13px" aria-hidden="false"> Mes </label>
                            </span>
                            <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="tel" class="form-textbox validate[required, limitDate]" id="year_13" name="q13_hagaClic13[year]" size="4" data-maxlength="4" data-age="" maxlength="4" value="" required="" autocomplete="off" aria-labelledby="label_13 sublabel_13_year">
                                <label class="form-sub-label" for="year_13" id="sublabel_13_year" style="min-height:13px" aria-hidden="false"> Año </label>
                            </span>
                            <span class="form-sub-label-container" style="vertical-align:top">
                                <img class="showAutoCalendar newDefaultTheme-dateIcon icon-seperatedMode" alt="Pick a Date" id="input_13_pick" src="img/calendar.png" data-component="datetime" aria-hidden="true" data-allow-time="No" data-version="v1">
                                <label class="form-sub-label" for="input_13_pick" style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px;white-space:nowrap" aria-hidden="true"> Date Picker Icon </label>
                            </span>
                        </div>
                    </div>
                </li>
                <li class="form-line jf-required" data-type="control_fullname" id="id_10">
                    <label class="form-label form-label-left form-label-auto" id="label_10" for="first_10">
                        QUINCENA
                        <span class="form-required">
                            *
                        </span>
                    </label>
                    <div id="cid_3" class="form-input jf-required">
                        <select class="form-dropdown validate[required]" id="input_3" name="q3_sucursal3" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_3">
                            <option value=""> </option>
                            <option value="1"> 1º QCNA ENERO </option>
                            <option value="2">2º QCNA ENERO </option>
                            <option value="3"> 1º QCNA FEBRERO </option>
                            <option value="4">2º QCNA FEBRERO </option>
                        </select>
                    </div>
                </li>
                <!--<li class="form-line jf-required" data-type="control_dropdown" id="id_3">
                    <label class="form-label form-label-left form-label-auto" id="label_3" for="input_3">
                        CLIENTE
                        <span class="form-required">
                          *
                        </span>
                      </label>
                    <div id="cid_3" class="form-input jf-required">
                        <select class="form-dropdown validate[required]" id="input_3" name="q3_sucursal3" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_3">
                          <option value="">  </option>
                          <option value="Av Freyre y Mendoza"> Argenti Lemon S.A. </option>
                          <option value="Blas Parera 7171">Dampas S.A. </option>
                          <option value="Eva Peron 6701"> Consorfrut </option>
                          <option value="Belgrano 1841">Santa Isabel </option>
                          <option value="14 de Julio 1761"> CLK </option>
                        </select>
                    </div>
                </li>-->
                <!--<li class="form-line jf-required" data-type="control_radio" id="id_4">
                    <label class="form-label form-label-left form-label-auto" id="label_4" for="input_4">
          TIPO DE PEDIDO
          <span class="form-required">
            *
          </span>
        </label>
                    <div id="cid_4" class="form-input jf-required">
                        <div class="form-single-column" role="group" aria-labelledby="label_4" data-component="radio">
                            <span class="form-radio-item" style="clear:left">
              <span class="dragger-item">
              </span>
                            <input type="radio" class="form-radio validate[required]" id="input_4_0" name="q4_tipoDe" value="Urgencia" required="">
                            <label id="label_input_4_0" for="input_4_0"> Urgencia </label>
                            </span>
                            <span class="form-radio-item" style="clear:left">
              <span class="dragger-item">
              </span>
                            <input type="radio" class="form-radio validate[required]" id="input_4_1" name="q4_tipoDe" value="Normal" required="">
                            <label id="label_input_4_1" for="input_4_1"> Normal </label>
                            </span>
                        </div>
                    </div>
                </li>-->
                <li class="form-line " data-type="control_matrix" id="id_7">

                    <class class="form-label form-label-top" id="label_7" for="input_7"> DETALLE FACTURACION Y PAGOS
                        <button type="button" class="btn-sm btn-danger" style="float: right; margin-top: -6px;" onclick="eliminarFila()">Eliminar Fila</button>
                        <!--<button method="POST" action="{{ url('/agrego_factura') }}" id="btnadd" class="btn-sm btn-primary" style="float: right; margin-top: -6px; margin-right: 3px;">Agregar Factura</button>-->
                        <button method="" action="" id="btnadd" class="btn-sm btn-primary" style="float: right; margin-top: -6px; margin-right: 3px;">Agregar Factura</button>
                    </class>

                    <form id="cid_7" class="form-input-wide">
                        <form id="miform" method="post" name="miform">
                            <table id="tblfact" summary="" role="presentation" cellpadding="4" cellspacing="0" class="form-matrix-table" data-component="matrix">
                                <thead>
                                    <tr class="form-matrix-tr form-matrix-header-tr">
                                        <!--<th class="form-matrix-th" style="border:none">
                                        &nbsp;
                                    </th>-->
                                        <th>Nº</th>
                                        <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_0">
                                            <label id="label_7_col_0"> <b> CLIENTE </b> </label>
                                        </th>
                                        <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_0">
                                            <label id="label_7_col_1"> <b> EMP. QUE FACTURA </b> </label>
                                        </th>
                                        <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_1">
                                            <label id="label_7_col_2"> <b> Nº FACTURA </b> </label>
                                        </th>
                                        <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_2">
                                            <label id="label_7_col_3"> <b> IMP. FACT. S/IVA </b> </label>
                                        </th>
                                    </tr>
                                </thead>
                                <tr class="form-matrix-tr form-matrix-value-tr" role="group" aria-labelledby="label_7 label_7_row_0">
                                    <!---<th scope="row" class="form-matrix-headers form-matrix-row-headers">
                                         <label id="label_7_row_0"> 1 </label>
                                    </th>-->
                                    <td>1</td>
                                    <td class="form-matrix-values">
                                        <select class="form-dropdown validate[required]" id="input_3" name="q3_sucursal3" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_3">
                                            <option value=""> </option>
                                            <option value="Av Freyre y Mendoza"> Argenti Lemon S.A. </option>
                                            <option value="Blas Parera 7171">Dampas S.A. </option>
                                            <option value="Eva Peron 6701"> Consorfrut </option>
                                            <option value="Belgrano 1841">Santa Isabel </option>
                                            <option value="14 de Julio 1761"> CLK </option>
                                        </select>
                                    </td>

                                    <td class="form-matrix-values">
                                        <select class="form-dropdown validate[required]" id="input_4" name="q3_sucursal3" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_3">
                                            <option value=""> </option>
                                            <option value="Av Freyre y Mendoza"> LIMAS Y LIMONES SRL </option>
                                            <option value="Blas Parera 7171"> AZ AGRICOLA SRL </option>
                                            <option value="Eva Peron 6701"> RACCOLTA SA </option>
                                            <option value="Belgrano 1841"> ZAL SAS </option>

                                        </select>
                                    </td>
                                    <td class="form-matrix-values">
                                        <input type="text" id="input_7_0_1" class="form-textbox" size="15" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_1">
                                    </td>
                                    <td class="form-matrix-values">
                                        <input type="text" id="input_7_0_2" class="form-textbox" size="15" name="q7_pedido7[1][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_2">
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
                                        <th>Nº</th>
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
                                        <td>1</td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_3" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_4" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_4">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_5" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_5">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_6" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6">
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
                                        <th>Nº</th>
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
                                        <td>1</td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_9" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_2">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_10" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_11" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_4">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_12" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_5">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_13" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6">
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
                                        <th>Nº</th>
                                        <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_6">
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
                                        <td>1</td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_7" class="form-textbox" size="15" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_0">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_8" class="form-textbox" size="15" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_1">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_14" class="form-textbox" size="15" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_0">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_15" class="form-textbox" size="15" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_1">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_16" class="form-textbox" size="15" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_2">
                                        </td>
                                        <td class="form-matrix-values">
                                            <input type="text" id="input_7_0_17" class="form-textbox" size="15" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_2">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </form>

                </li>

                <!--<script type="text/javascript">
                $(function() {
                    var count = 1;
                    jQuery("#miform").validationEngine({
                        promptPosition: "centerRight:0,-5"
                    });

                    $(document).on("click", "#btnadd", function(event) {
                        count++;
                        $('#tblfact tr:last').after('<tr><td>' + count + '</td><td class="form-matrix-values"><select class="form-dropdown validate[required]" id="input_3" name="q3_sucursal3" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_3"><<option value=""></option><option value="Argenti Lemon S.A."> Argenti Lemon S.A. </option><option value="Dampas S.A.">Dampas S.A. </option><option value="Consorfrut"> Consorfrut </option><option value="Santa Isabel">Santa Isabel </option><option value="CLK"> CLK </option></td></tr></td><td>');

                        event.preventDefault();
                    });
                });
            </script>-->
                <script type="text/javascript">
                    $(function() {
                        var count = 1;
                        jQuery("#miform").validationEngine({
                            promptPosition: "centerRight:0,-5"
                        });

                        $(document).on("click", "#btnadd", function(event) {
                            count++;
                            document.getElementById("tblfact").insertRow(-1).innerHTML = '<tr><td>' + count + '<td class="form-matrix-values"><select class="form-dropdown validate[required]" id="input_3" name="q3_sucursal3" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_3"><<option value=""></option><option value="Argenti Lemon S.A."> Argenti Lemon S.A. </option><option value="Dampas S.A.">Dampas S.A. </option><option value="Consorfrut"> Consorfrut </option><option value="Santa Isabel">Santa Isabel </option><option value="CLK"> CLK </option></td><td class="form-matrix-values"><select class="form-dropdown validate[required]" id="input_3" name="q3_sucursal3" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_3"><<option value=""></option><option value="Limas y Limones"> Limas y Limones </option><option value="AZ Agricolas">AZ Agricolas </option><option value="Raccolta"> Raccolta </option><option value="ZAL SAS">ZAL SAS </option></td><td class="form-matrix-values"><input type="text" id="input_7_0_1" class="form-textbox" size="15" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_1"><td class="form-matrix-values"><input type="text" id="input_7_0_2" class="form-textbox" size="15" name="q7_pedido7[1][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_2"></td>';
                            document.getElementById("tblfact1").insertRow(-1).innerHTML = '<tr><td>' + count + '<td class="form-matrix-values"><input type="text" id="input_7_0_3" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_4" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_4"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_5" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_5"></td><td class="form-matrix-values"><input type="text" id="input_7_0_6" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td>';
                            document.getElementById("tblfact2").insertRow(-1).innerHTML = '<tr><td>' + count + '<td class="form-matrix-values"><input type="text" id="input_7_0_3" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_4" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_4"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_5" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_5"></td><td class="form-matrix-values"><input type="text" id="input_7_0_6" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_6" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td>';
                            document.getElementById("tblfact3").insertRow(-1).innerHTML = '<tr><td>' + count + '<td class="form-matrix-values"><input type="text" id="input_7_0_3" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_3"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_4" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_4"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_5" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_5"></td><td class="form-matrix-values"><input type="text" id="input_7_0_6" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_6" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td><td class="form-matrix-values"><input type="text" id="input_7_0_6" class="form-textbox" size="20" name="q7_pedido7[0][]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_7_col_6"> </td>';
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
                            alert('No se puede eliminar la primera fila');
                        else
                            table.deleteRow(rowCount - 1);

                        if (rowCount1 <= 2)
                            alert('No se puede eliminar la primera fila');
                        else
                            table1.deleteRow(rowCount1 - 1);

                        if (rowCount2 <= 2)
                            alert('No se puede eliminar la primera fila');
                        else
                            table2.deleteRow(rowCount2 - 1);

                        if (rowCount3 <= 2)
                            alert('No se puede eliminar la primera fila');
                        else
                            table3.deleteRow(rowCount3 - 1);
                    }
                </script>

                <li class="form-line" data-type="control_textarea" id="id_14">
                    <label class="form-label form-label-left form-label-auto" id="label_14" for="input_14"> OBSERVACIONES </label>
                    <div id="cid_14" class="form-input">
                        <textarea id="input_14" class="form-textarea" name="q14_observaciones" cols="40" rows="6" data-component="textarea" aria-labelledby="label_14"></textarea>
                    </div>
                </li>
                <!--<li class="form-line jf-required" data-type="control_captcha" id="id_12">
                    <label class="form-label form-label-left form-label-auto" id="label_12" for="input_12">
          ESCRIBA EL TEXTO DE VERIFICACIÓN
          <span class="form-required">
            *
          </span>
        </label>
                    <div id="cid_12" class="form-input jf-required">
                        <div class="form-captcha" data-component="captcha">
                            <label for="input_12"> <img alt="Captcha - Reload if not displayed" id="input_12_captcha" class="form-captcha-image" style="background:url(https://cdn.jotfor.ms/images/loader-big.gif) no-repeat center" src="data:image/png;base64,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" width="150" height="41"> </label>
                            <div style="white-space:nowrap">
                                <input type="text" id="input_12" class="form-textbox validate[required]" name="captcha" style="width:130px" required="">
                                <img src="./Formulario de Pedido de Pinturas_files/reload.png" alt="Reload" style="cursor:pointer;vertical-align:middle" id="input_12_reload">
                                <input type="hidden" name="captcha_id" id="input_12_captcha_id" value="02e392f271b6a95bdff23ea85db3737a">
                            </div>
                        </div>
                    </div>
                </li>
                <li class="form-line" data-type="control_button" id="id_2">
                    <div id="cid_2" class="form-input-wide">
                        <div style="margin-left:156px" data-align="auto" class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
                            <button id="input_2" type="submit" class="form-submit-button form-submit-button-simple_grey submit-button jf-form-buttons jsTest-submitField" data-component="button" data-content="">
              Enviar
            </button>
                            <span>
              &nbsp;
            </span>
                            <button id="input_print_2" type="button" class="form-submit-print form-submit-button-simple_grey jf-form-buttons" data-component="button">
              <img src="./Formulario de Pedido de Pinturas_files/printer.png" style="vertical-align:middle">
              <span id="span_print_2" class="span_print">
                Print Form
              </span>
            </button>
                        </div>
                    </div>
                </li>
                <li style="display:none">
                    Should be Empty:
                    <input type="text" name="website" value="">
                </li>
            </ul>
        </div>
        <script>
            JotForm.showJotFormPowered = "new_footer";
        </script>
        <script>
            JotForm.poweredByText = "Powered by JotForm";
        </script>
        <input type="hidden" class="simple_spc" id="simple_spc" name="simple_spc" value="210806940381655-210806940381655">
        <script type="text/javascript">
            var all_spc = document.querySelectorAll("form[id='210806940381655'] .si" + "mple" + "_spc");
            for (var i = 0; i < all_spc.length; i++) {
                all_spc[i].value = "210806940381655-210806940381655";
            }
        </script>-->
        </ul>
        <div class="row justify-content-center mt-3">
            <div class="form-group col-md-10 col-form-label text-center">
                <button type="submit" class="btn btn-success">GRABAR</button>
                <a class="btn btn-primary" href="{{ ('control_quincenal') }}"> Regresar</a>
            </div>
        </div>
    </div>
    </form>
</body>
<!--@endsection-->