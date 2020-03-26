function borrar(borrar) {
    swal({
            title: "Esta Seguro?",
            text: "Una vez borrado, no se podra recuperar la informacion!",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancelar", "Si, Borrar!"]
        })
        .then((willDelete) => {
            if (willDelete) {
                //codigo para borrar cpn JS
                var route = "borrar_sancion/" + borrar.value + "";
                $.ajax({
                    url: route,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'DELETE',
                    dataType: 'json',
                    //success: function(data) {
                    //swal("Bien!! El registro fue borrado!", { icon: "success", });
                    //}
                });
                //window.location = '/sancion';
            } else {
                swal('Cancelado', "El registro no fue eliminado!", 'error', { button: "Salir" });
            }
        });
}