<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener las credenciales del usuario
        $user = $_POST['username'];
        $psswrd = $_POST['password'];

        // Verificar las credenciales del usuario (esto es solo un ejemplo,
        // en la práctica deberías usar una base de datos y funciones de hash para almacenar y verificar las contraseñas)
        if (verificar($user, $psswrd)) {
            // Si las credenciales son correctas, establecer una cookie para mantener al usuario conectado
            setcookie('username', $user, time() + 3600);
        } else {
            // Si las credenciales son incorrectas, mostrar un mensaje de error
            echo "Nombre de usuario o contraseña incorrectos";
        }
    }

    // Verificar si la cookie existe
    if (isset($_COOKIE['username'])) {
        // Si la cookie existe, mostrar contenido restringido al usuario
        echo "Bienvenido, " . $_COOKIE['username'];
    } else {
        // Si la cookie no existe, mostrar el formulario de inicio de sesión
    }
}

function verificar($user, $psswrd)
{
    $userDAL = new User();
    $res = $userDAL->verify($user, $psswrd);

    return $res;
}
