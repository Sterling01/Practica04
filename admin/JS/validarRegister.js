window.onload = iniciar;

function iniciar() {
    document.getElementById("crear").addEventListener('click',validar);
}

function validaCedula() {
    var elemento = document.getElementById("cedula");
    if (elemento.validity.valueMissing) {
        error(elemento, "Ingresa una cedula")
        return false;
    }
    return true;
}
        
function validaNombre() {
    var elemento = document.getElementById("nombres");
    if (elemento.validity.valueMissing) {
        error(elemento, "Ingresa tus nombres")
        return false;
    }
    return true;    
}

function validaApellido() {
    var elemento = document.getElementById("apellidos");
    if (elemento.validity.valueMissing) {
        error(elemento, "Ingresa tus apellidos")
        return false;
    }
    return true;    
}

function validaDireccion() {
    var elemento = document.getElementById("direccion");
    if (elemento.validity.valueMissing) {
        error(elemento, "Ingresa una direccion")
        return false;
    }
    return true;    
}

function validaTelefono() {
    var elemento = document.getElementById("telefono");
    if (elemento.validity.valueMissing) {
        error(elemento, "Ingresa un telefono")
        return false;
    }
    return true;    
}

function validaFechaNacimiento() {
    var elemento = document.getElementById("fechaNacimiento");
    if (elemento.validity.valueMissing) {
        error(elemento, "Ingresa una fecha de nacimiento")
        return false;
    }
    return true;    
}

function validaCorreo() {
    var elemento = document.getElementById("correo");
    if (elemento.validity.valueMissing) {
        error(elemento, "Ingresa un correo")
        return false;
    }
    return true;    
}

function validaContrasena() {
    var elemento = document.getElementById("contrasena");
    if (elemento.validity.valueMissing) {
        error(elemento, "Ingresa una contraseña")
        return false;
    }
    return true;    
}

function validar(e) {
    borrarError();
    if (validaCedula() && validaNombre() && validaApellido() && validaDireccion() && validaTelefono() && validaFechaNacimiento() && validaCorreo() && validaContrasena()) {
        return true
    } else {
        e.preventDefault();
        return false;
    }
}

function error(elemento, mensaje, cod) {
        document.getElementById("errorRegister").innerHTML = mensaje;
        elemento.className = "error";
        elemento.focus();    
}

function borrarError() {
    var formulario = document.forms[0];
    for (var i = 0; i < formulario.elements.length; i++) {
        formulario.elements[i].className = "";
    }
}