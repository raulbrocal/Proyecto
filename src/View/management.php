<?php
require_once("../Business/info.php");
$infoBL = new RestaurantInfo;
$info = $infoBL->getRestaurantData();

if (isset($_POST['action']) && $_POST['action'] == "login") {
    require_once("../Business/login.php");
    $loginBL = new Login;
    $res = $loginBL->login($_POST['user'], $_POST['psswrd']);
    if (!$res) {
        $error = 'Usuario y/o contraseña incorrectas. Por favor, inténtalo de nuevo.';
    }
}
if (isset($_COOKIE['session'])) {
    require_once("../Business/session.php");
    $userBL = new Session;
    $userData = $userBL->getUserData($_COOKIE['session']);
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión</title>
    <link rel="icon" href="../../img/logo.png">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/login.js"></script>
    <script src="../../js/management.js"></script>
    <style>
        #main.container-fluid {
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            height: 100%;
        }

        .select-wrapper {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
        }

        select {
            padding: 5px;
            font-size: 14px;
            border-radius: 4px;
        }

        div#tablaDatos table {
            display: inline-block;
            max-width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        div#tablaDatos table th,
        div#tablaDatos table td {
            padding: 8px;
            border: 1px solid #ddd;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        div#tablaDatos table th {
            background-color: #f5f5f5;
            font-weight: bold;
            text-align: left;
        }

        div#tablaDatos button {
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 4px;
            background-color: #FF6666;
            ;
            color: white;
            border: none;
        }

        div#tablaDatos button:hover {
            background-color: #FE0000;
            cursor: pointer;
        }

        div#tablaDatos {
            max-height: 89%;
            flex-grow: 1;
            overflow-y: auto;
        }
    </style>
</head>

<body>
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

    <body>
        <div id="main" class="container-fluid">
            <h1>Tablas de la Base de Datos</h1>
            <div class="select-wrapper">
                <select id="tabla">
                    <option>Seleccione una tabla ...</option>
                    <option value="restaurant">Restaurante</option>
                    <option value="user">Usuarios</option>
                    <option value="dinnerTable">Mesas</option>
                    <option value="reservationSchedule">Horarios de Reserva</option>
                    <option value="reservation">Reservas</option>
                    <option value="drink">Bebidas</option>
                    <option value="dishes">Platos</option>
                    <option value="dessert">Postres</option>
                </select>
            </div>
            <div id="tablaDatos"></div>
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