function confirmar() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((respuesta) => {
        if (respuesta.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    });
    var respuesta = confirm("Seguro de que quieres Eliminar esta Transaccion?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }


}

function confcheck() {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'your transaction was successful.',
        showConfirmButton: false,
        timer: 1500
    })
}