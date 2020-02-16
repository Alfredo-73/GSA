$(document).on('click', '.borrar1', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
        title: 'Esta Seguro?',
        text: 'Una vez borrado, no podra ver el registro!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    }).then((result) => {
        if (result) {
            swal('El registro fue eliminado!', { icon: 'success', });
        } else { swal('No se borro el registro'); }
    });
});

/*function(result) {
    $.ajax({
        type: "POST",
        url: "{{url('/borrar_cosecha/{{id}}')}}",
        data: { id: id },
        success: function(data) {
            //
        }
    });
};*/

/*function confirmDelete(e) {
    e.preventDefault();
    swal({
        title: 'Esta Seguro?',
        text: 'Una vez borrado, no podra ver!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            swal(' Poof! Your imaginary file has been deleted!', { icon: 'success', });
        } else { swal('Your imaginary file is safe!'); }
    });
}

function deleteRequest() {
    // enviar información al servidor, vía ajax, o por algún otro método
    $.ajax({
        type: "POST",
        url: "{{url('/borrar_cosecha')}}",
        data: { id: id },
        success: function(data) {
            //
        }
    });
}*/



/*swal({
    title: 'Esta Seguro?',
    text: 'Una vez borrado, no podra ver!',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
}).then((willDelete) => {
    if (willDelete) {
        swal(' Poof! Your imaginary file has been deleted!', { icon: 'success', });
    } else { swal('Your imaginary file is safe!'); }
});*/