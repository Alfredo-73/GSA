function borra(borra) {
    var route = "resumen_control/" + borra.value + "";
    console.log(route);
    swal({
        title: "¿Está seguro?",
        text: "Una vez borrado, no se podrá recuperar la información.",
        icon: "warning",
        dangerMode: true,
        buttons: ["Cancelar", "Sí, borrar!"]
    }).then((willDelete) => {
        if (willDelete) {
            // Obtener el valor de id_factura para la fila que se está eliminando
            $.ajax({
                url: "resumen_control/" + borra.value + "",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'DELETE',
                dataType: 'json',
                beforeSend: function() {},
                success: function(response) {
                    // Construir la nueva URL con el valor de id_factura
                    var nueva_ruta = "resumen_control/" + borra.value + "";
                    console.log('nueva es: ' + nueva_ruta);
                    $.ajax({
                        url: nueva_ruta,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        type: 'DELETE',
                        dataType: 'json',
                        beforeSend: function() {},
                        success: function(response) {
                            swal("¡Muy bien!",
                                "Registro borrado.",
                                "success"
                            ).then(okay => {
                                if (okay) {
                                    window.location.href = "/resumen_control";
                                }
                            })
                        },
                        error: function() {
                            swal('ERROR', "No se borró el registro.", 'error', { button: "Salir" });
                        },
                    });
                },
                error: function() {
                    swal('ERROR', "No se pudo obtener el valor de id_factura.", 'error', { button: "Salir" });
                },
            });
        } else {
            swal('Cancelado', "El registro no fue eliminado.", 'error', { button: "Salir" });
        }
    });
}