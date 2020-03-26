function validar(formulario) {
    //var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var legajo, nombre, apellido, dni, cuil, fecha_ingreso, empresa, capataz;

    legajo = document.getElementById("legajo").value;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    dni = document.getElementById("dni").value;
    cuil = document.getElementById("cuil").value;
    fecha_ingreso = document.getElementById("fecha_ingreso").value;
    empresa = document.getElementById("empresa").value;
    capataz = document.getElementById("capat").value;

    if ((document.getElementById("legajo").value.length) >= 0)
        fetch(`/legajo/validacion/?legajo= ${document.getElementById("legajo").value}`, {
            method: 'get'
        })
        .then(function(response) {
            return response.text();
        })
        .then(function(data) {

            console.log('DATO GUARDADO EN BASE DE DATOS:', data);
            console.log('DATO INGRESADO EN INPUT:', document.getElementById("legajo").value)
            console.log(data.indexOf("legajo") >= 0)

            if (data.indexOf("legajo") >= 0) {
                swal("ERROR", "EL Nº de Legajo ya existe, elija otro", "error");
            }
        })

    if (legajo === "") {
        swal("ERROR", "El campo LEGAJO esta vacio", "error");
        document.getElementById("legajo").focus();
        return false;
    } else if (legajo == 0) {
        swal("ERROR", "El campo LEGAJO no puede ser cero", "error");
        document.getElementById("legajo").focus();
        return false;
    } else if (isNaN(legajo)) {
        swal("ERROR", "El campo LEGAJO solo acepta NUMEROS.", "error");
        document.getElementById("legajo").focus();
        return false;
    } else if (nombre === "") {
        swal("ERROR", "El campo NOMBRE esta vacio", "error");
        document.getElementById("nombre").focus();
        return false;
    } else if (nombre.length > 50 || nombre.length < 3) {
        swal("ERROR", "Los NOMBRES deben contar con entre 3 y 50 caracteres", "error");
        // nombre.setCustomValidity("Nombre no puede tener menos de 3 caracteres");
        document.getElementById("nombre").focus();
        return false;
    } else if (apellido === "") {
        swal("ERROR", "El campo APELLIDO esta vacio", "error");
        document.getElementById("apellido").focus();
        return false;
    } else if (apellido.length > 50 || apellido.length < 3) {
        swal("ERROR", "Los APELLIDOS deben contar con entre 3 y 50 caracteres", "error");
        // nombre.setCustomValidity("Nombre no puede tener menos de 3 caracteres");
        document.getElementById("apellido").focus();
        return false;
    } else if (isNaN(dni)) {
        swal("ERROR", "El campo DNI solo acepta NUMEROS, y largo de 8.", "error");
        document.getElementById("dni").focus();
        return false;
    } else if (dni.length > 8 || dni.length < 8) {
        swal("ERROR", "La Longitud de el Nº de DNI tiene que ser 8.", "error");
        // nombre.setCustomValidity("Nombre no puede tener menos de 3 caracteres");
        document.getElementById("dni").focus();
        return false;
    } else if (cuil === "") {
        swal("ERROR", "El campo CUIL esta vacio", "error");
        document.getElementById("cuil").focus();
        return false;
    } else if (cuil.length > 11 || cuil.length < 11) {
        swal("ERROR", "La Longitud de el Nº de CUIL tiene que ser 11.", "error");
        // nombre.setCustomValidity("Nombre no puede tener menos de 3 caracteres");
        document.getElementById("cuil").focus();
        return false;
    } else if (fecha_ingreso === "") {
        swal("ERROR", "Ingrese una FECHA DE INGRESO", "error");
        document.getElementById("fecha_ingreso").focus();
        return false;
    } else if (empresa === "Elegir Empresa") {
        swal("ERROR", "Elija una EMPRESA para el empleado nuevo", "error");
        document.getElementById("empresa").focus();
        return false;
    } else if (capataz === "Elegir Capataz") {
        swal("ERROR", "Elija un CAPATAZ para el empleado nuevo", "error");
        document.getElementById("capat").focus();
        return false;
    }
}