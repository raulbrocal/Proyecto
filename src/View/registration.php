<?php
require("../Controller/session.php");
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once("../Controller/session.php");
        $userBL = new Session;
        $newUser = $userBL->registerNewUser($_POST['username'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phone'], $_POST['birth'], $_POST['password']);
        header("index.php");
    }
} catch (\Throwable $th) {
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Únete a nosotros</title>
    <link rel="icon" href="../../img/logo.png">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/registration.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/login.js"></script>
    <style>
        .toast-container {
            z-index: 9999;
            top: 5.5%;
            right: 1px;
            transform: translate(-5.5%);
            max-width: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .toast {
            background-color: #f8f9fa;
            border: 1px solid #dcdcdc;
            padding: 15px;
            border-radius: 5px;
        }

        .toast-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            border-radius: 5px;
        }

        .toast-body {
            margin-bottom: 10px;
        }

        main {
            width: 100%;
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            font-family: sans-serif;
            padding: 15px;
        }

        label {
            text-align: left;
            font-family: sans-serif;
            color: gray;
        }

        input {
            width: 100%;
            border: 5px solid #f29100;
            border-radius: 50px;
            font-family: Poppins, sans-serif;
            font-weight: 400;
            font-size: 18px;
            color: #000;
            padding: 7px 25px;
            margin: 10px 0;
        }

        #submit {
            width: 100%;
            font-size: 1.5em;
            border: none;
            background-color: gray;
            padding: .4em;
            color: white;
            border-radius: 10px;
            margin-top: 35px;
        }

        button:disabled {
            background-color: lightgray;
            color: white;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="../../img/logo.png" alt="logo" style="max-height: 100%;"></a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="menu.php"><button type="button" class="btn">Nuestra carta</button></a>
                        </li>
                        <li class="nav-item">
                            <a href="registration.php"><button type="button" class="btn">Únete a
                                    nosotros</button></a>
                        </li>
                        <li class="nav-item">
                            <a href="reservation.php"><button type="button" class="btn">Reserva tu
                                    mesa</button></a>
                        </li>
                        <li class="nav-item">
                            <a href="aboutus.php"><button type="button" class="btn">Sobre nosotros</button></a>
                        </li>
                        <li class="nav1-item">
                            <a href="user.php"><button type="button" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg></button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="toast-container position-fixed">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Inicio de sesión</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <form method="POST" action="../Controller/login.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="username" placeholder="Ingrese su nombre de usuario">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        <a class="btn btn-primary float-end" href="./registration.php" role="button">Registrate</a>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main>
        <h1>Únete a nosotros</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="off">
            <label for="name">Nombre</label><br>
            <input type="text" id="name" name="name" placeholder="Nombre*" autofocus maxlength="20" required><br>
            <label for="surname">Apellidos</label><br>
            <input type="text" id="surname" name="surname" maxlength="60" required><br>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" placeholder="hola@gmail.com" maxlength="250" required><br>
            <label for="birth">Fecha de nacimiento</label><br>
            <input type="date" id="birth" name="birth" max="2020-12-31" required><br>
            <label for="phone">Número de teléfono</label><br>
            <input type="text" id="phone" name="phone" maxlength="10" title="Déjenos su número de teléfono para contactar con usted." required><br>
            <label for="user">Usuario</label><br>
            <input type="text" id="user" name="user" placeholder="usuario_123" autofocus maxlength="20" title="El nombre de usuario debe ser una palabra de 5 a 20 caracteres sin espacios pudiendo incluir &quot.&quot y &quot_&quot" required><br>
            <label for="psswrd">Contraseña</label><br>
            <input type="psswrd" name="psswrd" id="psswrd" placeholder="**********" title="La contraseña debe tener una longitud mínima de 8 caracteres y contener en ella una minúscula, una mayúscula, un número y un caracteres especial" required>
            <button type="submit" name="submit" id="submit" disabled>Enviar</button>
        </form>
    </main>

    <footer>
        <div class="container">
            <p class="text" style="text-align: center;">&copy; 2023 Crew Bar. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>

<?php
if (isset($error)) {
    echo '<script type="text/javascript">alert("Alert message here")</script>';
}
