function borrar() {
    var route = "modif_control/" + borra.value + "";
    console.log(route);
    var rowCount = $('#modif_control tbody tr').length;
    console.log('Nº DE LINEAS: ' + rowCount);
    swal({
            title: "Esta Seguro?",
            text: "Una vez borrado, no se podra recuperar la informacion!",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancelar", "Si, Borrar!"]
        })
        .then((willDelete) => {
            if (willDelete) {
                var route1 = borra.value + "";
                console.log(route1);
                $.ajax({
                    url: route1,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'DELETE',
                    dataType: 'json',
                    beforeSend: function() {},
                    success: function(response) {
                        swal("Muy bien!",
                            "Registro Borrado",
                            "success"
                        ).then(okay => {
                            var rowCount = $('#modif_control tbody tr').length;
                            if (rowCount > 0) {
                                window.location.href = "/resumen_control";
                            } else {
                                window.location.href = "/resumen_control";
                            }
                        })
                    },
                    error: function() {
                        swal('ERROR', "NO SE BORRO EL REGISTRO", 'error', { button: "Salir" });
                    },
                });
            } else {
                swal('Cancelado', "El registro no fue eliminado!", 'error', { button: "Salir" });
            }
        });
}