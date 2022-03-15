function validar_control(formulario) {
    //var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var quincena, factura, importe, retencion, monto_cobrado, gasto_bancario, pago_personal, pago_transporte, toneladas;
    quincena = document.getElementById("id_quincena").value;
    factura = document.getElementById("num_factura").value;
    importe = document.getElementById("importe").value;
    cliente = document.getElementById("id_cliente").value;
    //retencion = document.getElementById("retencion").value;
    monto_cobrado = document.getElementById("monto_cobrado").value;
    //gasto_bancario = document.getElementById("gasto_bancario").value;
    pago_personal = document.getElementById("pago_personal").value;
    //pago_transporte = document.getElementById("pago_transporte").value;
    //toneladas = document.getElementById("toneladas").value;

    if (quincena === "Elegir Quincena") {
        swal("ERROR", "Elija una QUINCENA", "error");
        document.getElementById("id_quincena").focus();
        return false;
    } else if (factura === "") {
        swal("ERROR", "El campo Nº DE FACTURA no puede estar en blanco.", "error");
        document.getElementById("num_factura").focus();
        return false;
    } else if (isNaN(factura)) {
        swal("ERROR", "El campo Nº de Factura solo acepta NUMEROS.", "error");
        document.getElementById("num_factura").focus();
        return false;
    } else if (importe === "") {
        swal("ERROR", "El campo IMPORTE DE FACTURA no puede estar en blanco.", "error");
        document.getElementById("num_factura").focus();
        return false;
    } else if (isNaN(importe)) {
        swal("ERROR", "El campo IMPORTE DE FACTURA solo acepta NUMEROS.", "error");
        document.getElementById("num_factura").focus();
        return false;
    } else if (cliente === "Elegir Cliente") {
        swal("ERROR", "Elija un CLIENTE", "error");
        document.getElementById("id_cliente").focus();
        return false;
        /*} else if (retencion === "") {
            swal("ERROR", "El campo RETENCION no puede estar en blanco.", "error");
            document.getElementById("retencion").focus();
            return false;
        } else if (isNaN(retencion)) {
            swal("ERROR", "El campo RETENCION solo acepta NUMEROS.", "error");
            document.getElementById("retencion").focus();
            return false;*/
    } else if (monto_cobrado === "") {
        swal("ERROR", "El campo MONTO COBRADO no puede estar en blanco.", "error");
        document.getElementById("monto_cobrado").focus();
        return false;
    } else if (isNaN(monto_cobrado)) {
        swal("ERROR", "El campo MONTO COBRADO solo acepta NUMEROS.", "error");
        document.getElementById("monto_cobrado").focus();
        return false;
        /*} else if (gasto_bancario === "") {
            swal("ERROR", "El campo GASTO BANCARIO no puede estar en blanco.", "error");
            document.getElementById("gasto_bancario").focus();
            return false;
        } else if (isNaN(gasto_bancario)) {
            swal("ERROR", "El campo GASTO BANCARIO solo acepta NUMEROS.", "error");
            document.getElementById("gasto_bancario").focus();
            return false;*/
    } else if (pago_personal === "") {
        swal("ERROR", "El campo PAGO PERSONAL no puede estar en blanco.", "error");
        document.getElementById("pago_personal").focus();
        return false;
    } else if (isNaN(pago_personal)) {
        swal("ERROR", "El campo PAGO PERSONAL solo acepta NUMEROS.", "error");
        document.getElementById("pago_personal").focus();
        return false;
        /*} else if (pago_transporte === "") {
            swal("ERROR", "El campo PAGO TRANSPORTE no puede estar en blanco.", "error");
            document.getElementById("pago_transporte").focus();
            return false;
        } else if (isNaN(pago_transporte)) {
            swal("ERROR", "El campo PAGO TRANSPORTE solo acepta NUMEROS.", "error");
            document.getElementById("pago_transporte").focus();
            return false;*/
        /*} else if (toneladas === "") {
            swal("ERROR", "El campo TONELADAS no puede estar en blanco.", "error");
            document.getElementById("toneladas").focus();
            return false;
        } else if (isNaN(toneladas)) {
            swal("ERROR", "El campo TONELADAS solo acepta NUMEROS.", "error");
            document.getElementById("toneladas").focus();
            return false;*/
    }
};