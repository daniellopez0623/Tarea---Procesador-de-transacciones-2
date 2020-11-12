function confirmar() {
    var respuesta = confirm("Seguro de que quieres Eliminar esta Transaccion?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }
}