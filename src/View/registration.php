<?php
require_once("../Business/info.php");
$infoBL = new RestaurantInfo;
$info = $infoBL->getRestaurantData();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['action'])) {
        require_once("../Business/session.php");
        $userBL = new Session;
        $newUser = $userBL->registerNewUser($_POST['username'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phone'], $_POST['birth'], $_POST['password']);
    } else {
        require_once("../Business/login.php");
        $loginBL = new Login;
        $res = $loginBL->login($_POST['user'], $_POST['psswrd']);
        if (!$res) {
            $error = 'Usuario y/o contraseña incorrectas. Por favor, inténtalo de nuevo.';
        }
    }
}
if (isset($_COOKIE['session'])) {
    require_once("../Business/session.php");
    $userBL = new Session;
    $userData = $userBL->getUserData($_COOKIE['session']);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/login.js"></script>
    <style>
        #video-playa {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        #main {
            width: 100%;
            max-width: 600px;
            margin: auto;
            margin-top: 2.65%;
            margin-bottom: 2.65%;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 1%;
            padding: 2%;
        }

        #main h1 {
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
            margin: 1% 0;
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

        div#error.toast-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            z-index: 9999;
        }

        div#error.toast-container .toast {
            position: relative;
            min-width: 200px;
            padding: .75rem 1rem;
            border-radius: .25rem;
            background-color: #000;
            color: #fff;
            pointer-events: auto;
        }

        div#error.toast-container .toast .btn-close {
            position: absolute;
            top: .25rem;
            right: .5rem;
        }
    </style>
</head>

<body>
    <video id="video-playa" autoplay muted loop>
        <source src="../../img/sea.mp4" type="video/mp4">
    </video>
    <header>
        <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="../../img/logo.png" alt="logo" style="max-height: 100%;"></a>
                <h1 style="color: #F7F7F7;"><?php echo $info['name'] ?></h1>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($userData) && $userData['profile'] == 'EMPLOYEE') { ?>
                            <li class="nav-item">
                                <a href="management.php"><button type="button" class="btn">Gestión</button></a>
                            </li>
                        <?php }; ?>
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
                        <li class="nav1-item">
                            <button type="button" class="btn" id="liveToastBtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </svg></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="toast-container position-fixed">
            <div id="liveToast" class="toast fade hide" role="alert" aria-live="assertive" aria-atomic="true">
                <?php if (!isset($userData)) { ?>
                    <div class="toast-header">
                        <strong class="me-auto">Inicio de sesión</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="mb-3">
                                <label for="user" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="user" name="user" placeholder="Ingrese su nombre de usuario">
                            </div>
                            <div class="mb-3">
                                <label for="psswrd" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="psswrd" name="psswrd" placeholder="Ingrese su contraseña">
                            </div>
                            <input type="hidden" name="action" value="login">
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                            <a class="btn btn-primary float-end" href="./registration.php" role="button">Registrate</a>
                        </form>
                    </div>
                <?php } else { ?>
                    <div class="toast-header">
                        <table class="table">
                            <tr>
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg></td>
                                <td><?php echo $userData['name'] . " " . $userData['surname']; ?></td>
                                <td>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><?php echo $userData['email']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="toast-body">
                        <p><strong>Número de reservas:</strong> 1</p>
                        <p><strong>Fecha de cumpleaños:</strong> <?php echo $userData['birth_date']; ?></p>
                        <p><strong>Número de teléfono:</strong> <?php echo $userData['phone']; ?></p>
                    </div>
                    <a class="btn btn-primary" href="../Business/logout.php" role="button">Cerrar Sesión</a>
                    <a class="btn btn-primary float-end" href="./reservation.php" role="button">Reserva ya</a>
                <?php } ?>
            </div>
        </div>
    </header>
    <div style="height: 200%;">
        <?php if (isset($newUser)) { ?>
            <div class="toast-container" id="error">
                <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Hello, world! This is a toast message.
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div id="main">
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
                <label for="username">Usuario</label><br>
                <input type="text" id="username" name="username" placeholder="usuario_123" autofocus maxlength="20" title="El nombre de usuario debe ser una palabra de 5 a 20 caracteres sin espacios pudiendo incluir &quot.&quot y &quot_&quot" required><br>
                <label for="password">Contraseña</label><br>
                <input type="password" name="password" id="password" placeholder="**********" title="La contraseña debe tener una longitud mínima de 8 caracteres y contener en ella una minúscula, una mayúscula, un número y un caracteres especial" required>
                <button type="submit" name="submit" id="submit" disabled>Enviar</button>
            </form>
        </div>
    </div>

    <footer>
        <div class="container">
            <p style="margin: auto;">&copy; 2023 <?php echo $info['name'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp+34 <?php echo $info["phone"] ?></p>
        </div>
    </footer>

    <?php
    if (isset($error)) {
        $error = "Credenciales inválidas. Por favor, inténtalo de nuevo.";
        echo '<div id="error-container">';
        echo '    <div>';
        echo '        <h3>Advertencia</h3>';
        echo '    </div>';
        echo '    <div id="error-message">' . $error . '</div>';
        echo '</div>';
        echo '<script>setTimeout(hideError, 3000);</script>';
    }
    ?>

</body>

</html>