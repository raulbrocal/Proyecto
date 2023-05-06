<?php
// Verificar si el formulario de inicio de sesión ha sido enviado
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Obtener las credenciales del usuario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales del usuario (esto es solo un ejemplo,
    // en la práctica deberías usar una base de datos y funciones de hash para almacenar y verificar las contraseñas)
    if ($username == 'JohnDoe' && $password == 'secret') {
        // Si las credenciales son correctas, establecer una cookie para mantener al usuario conectado
        setcookie('username', $username, time() + 3600);
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
    ?>
    <form method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <?php
}
?>