function validar() {
    var rfc, nombre, direccion, telefono, correo, expresion;
    rfc = document.getElementById('rfc').value;
    nombre = document.getElementById('nombre').value;
    direccion = document.getElementById('direccion').value;
    telefono = document.getElementById('telefono').value;
    correo = document.getElementById('correo').value;
    expresion = /\w+@\w+\.+[a-z]/;

    if(rfc === "" || nombre === "" || direccion === "" || telefono === "" || correo === "") {
        alert('Todos los campos son obligatorios');
        return false;
    } else if(rfc.length > 15) {
        alert('RFC incorrecto');
        return false;
    } else if(telefono.length > 10 || isNaN(telefono)) {
        alert('Teléfono incorrecto');
        return false;
    } else if(!expresion.test(correo)) {
        alert('E-mail incorrecto');
        return false;
    } else {
        return false;
    }
}