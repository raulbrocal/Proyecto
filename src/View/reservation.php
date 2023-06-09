<?php
require_once("../Business/info.php");
$infoBL = new RestaurantInfo;
$info = $infoBL->getRestaurantData();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action == "reservation" && isset($_COOKIE['session'])) {
        require_once("../Business/reservation.php");
        $reservationBL = new ReservationLogic;
        $newReservation = $reservationBL->reserveTable($_COOKIE['session'], $_POST['time'], $_POST['date'],  $_POST['people']);
    } else if ($action == "login") {
        require_once("../Business/login.php");
        $loginBL = new Login;

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $user = $_POST['username'];
            $psswrd = $_POST['password'];
        } else {
            $user = $_POST['user'];
            $psswrd = $_POST['psswrd'];
        }
        $res = $loginBL->login($user, $psswrd);
        if (!$res) {
            $error = 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/login.js"></script>
    <script src="../../js/reservation.js"></script>
    <style>
        body {
            height: 100%;
            background-image: url(../../img/reservation.jpg);
            background-size: cover;
            background-position: center;
        }

        .container-xxl {
            margin-top: 2.85%;
            margin-bottom: 2.86%;
            width: 35%;
            max-width: 35%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            height: 850px;
            padding: 70px;
        }

        .reservation-box {
            text-align: center;
        }

        .reservation-box h1 {
            font-size: 5vh;
        }

        .help-box {
            background-color: rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin-top: 20px;
        }

        .help-box p {
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .accordion .accordion-item {
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .accordion-button,
        .accordion-collapse,
        .accordion-header,
        .accordion-body {
            border-radius: 10px;
            border: none;
        }

        .btn-info {
            width: 100%;
        }

        .btn-info:hover {
            background-color: red;
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

    <div class="container-xxl">
        <?php if (isset($_COOKIE['session'])) { ?>
            <div class="reservation-box">
                <h1 style="font-family: 'Lilita One', cursive;">RESERVA TU MESA YA</h1>
                <br>
                <div class="help-box">
                    <p>En caso de surgir alguna duda o pregunta, puede contactar con nosotros llamando al <strong>+34 638 44 01 77</strong> o contactar con nosotros a través de nuestras redes sociales.</p>
                </div>
                <br><br>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    </svg>&nbspComensales
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded">
                                    <div class="form-group">
                                        <select class="form-control" id="people" name="people" required>
                                            <option value="1">1 persona</option>
                                            <option value="2">2 personas</option>
                                            <option value="3">3 personas</option>
                                            <option value="4">4 personas</option>
                                            <option value="5">5 personas</option>
                                            <option value="6">6 personas</option>
                                            <option value="7">7 personas</option>
                                            <option value="8">8 personas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zm5.402 9.746c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z" />
                                        <path d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm-2.89-5.435v5.332H5.77V8.079h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z" />
                                    </svg>&nbspFecha
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="date" name="date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    </svg>&nbspHora
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded">
                                    <div class="form-group">
                                        <select class="form-control" id="time" name="time" required>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="action" value="reservation">
                    <br>
                    <input type="submit" class="btn btn-info" value="Continuar">
                </form>
            </div>
        <?php } else { ?>
            <div class="reservation-box">
                <h1 style="font-family: 'Lilita One', cursive;">INICIA SESIÓN PARA RESERVAR TU MESA</h1>
                <br>
                <div class="help-box">
                    <p>Para poder realizar una reserva en nuestro sistema, primero debemos comprobar que estás registrado en nuestra base de datos. Por favor, inicie sesión o por el contrario registrese en nuestra página web.</p>
                </div>
                <br><br>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username" hidden>Inicio de sesión</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Usuario" required />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password" hidden>Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required />
                    </div>
                    <input type="hidden" name="action" value="login">
                    <input type="submit" class="btn btn-info" value="Iniciar sesión">
                </form>
                <br>
                <div class="error"><?php echo isset($error) ? $error : ''; ?></div>
            </div>
        <?php } ?>
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