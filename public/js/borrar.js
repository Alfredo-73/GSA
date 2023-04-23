function borrar(borra) {
    var route = "borrar_cosecha/" + borra.value + "";
    console.log(route);
    swal({
            title: "Esta Seguro?",
            text: "Una vez borrado, no se podra recuperar la informacion!",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancelar", "Si, Borrar!"]
        })
        .then((willDelete) => {
            if (willDelete) {
                var route1 = "borrar_cosecha/" + borra.value + "";
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
                            if (okay) {
                                window.location.href = "/cosecha";
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