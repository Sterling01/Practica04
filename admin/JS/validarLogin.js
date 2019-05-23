window.onload = iniciar;

function iniciar() {
    document.getElementById("login").addEventListener('click',validar);
}

function validaCorreo() {
    var elemento = document.getElementById("correo");
    if (elemento.validity.valueMissing) {
        error(elemento, "Ingresa un correo", 0)
        return false;
    }
    return true;
}
        
function validaContrasena() {
    var elemento = document.getElementById("contrasena");
        if (elemento.validity.valueMissing) {
            error(elemento, "Ingresa una contraseña", 1)
            return false;
        }
    return true;    
    }

function validar(e) {
    borrarError();
    if (validaCorreo() && validaContrasena()) {
        return true
    } else {
        e.preventDefault();
        return false;
    }
}

function error(elemento, mensaje, cod) {
        document.getElementById("errorLogin").innerHTML = mensaje;
        elemento.className = "error";
        elemento.focus();    
}

function borrarError() {
    var formulario = document.forms[0];
    for (var i = 0; i < formulario.elements.length; i++) {
        formulario.elements[i].className = "";
    }
}