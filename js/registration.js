/**
 * Función para validar varios patrones
 */
function validarDatos() {
    let patrones = new Map();

    patrones.set("name", /^[A-Za-záéíóúüàèiòÁÉÍÓÚÀÈÒÜñÑçÇ]{2,}$/);
    patrones.set("surname", /^[A-Za-záéíóúüàèiòÁÉÍÓÚÀÈÒÜñÑçÇ ]{2,}$/);
    patrones.set("email", /^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@gmail\.com$/);
    patrones.set("phone", /^\d{9}$/);
    patrones.set("username", /^[a-zA-Z0-9_.]{5,20}$/);
    patrones.set("password", /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z\d!@#$%^&*]{8,}$/);

    if (patrones.get(this.id).test(this.value)) {
        this.style.borderColor = "green";
        this.style.fontFamily = "";
        verificarFormulario();
    } else if (this.value === "") {
        this.style.borderColor = "";
        this.style.fontFamily = "";
    } else {
        this.style.borderColor = "red";
        this.style.fontFamily = "sans-serif";
    }

}

function verificarFormulario() {
    let submit = document.getElementById('submit');
    let inputs = document.querySelectorAll('input');
    let formularioValido = true;

    for (let input of inputs) {
        if (!input.checkValidity()) {
            formularioValido = false;
            break;
        }
    }

    submit.disabled = !formularioValido;
}

// Ejecución de la aplicación
window.addEventListener('load', function () {
    let name = document.getElementById('name');
    let surname = document.getElementById('surname');
    let email = document.getElementById('email');
    let phone = document.getElementById('phone');
    let username = document.getElementById('username');
    let password = document.getElementById('password');

    name.addEventListener('keyup', validarDatos);
    surname.addEventListener('keyup', validarDatos);
    email.addEventListener('keyup', validarDatos);
    phone.addEventListener('keyup', validarDatos);
    username.addEventListener('keyup', validarDatos);
    password.addEventListener('keyup', validarDatos);
});