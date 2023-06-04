<?php
if (isset($_POST['action']) && $_POST['action'] == "login") {
    require_once("../Controller/login.php");
    $loginBL = new Login;
    $res = $loginBL->login($_POST['user'], $_POST['psswrd']);
    if (!$res) {
        $error = 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crew Bar</title>
    <link rel="icon" href="../../img/logo.png">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/login.js"></script>
    <style>
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="../../img/logo.png" alt="logo" style="max-height: 100%;"></a>
                <h1>Crew Bar</h1>
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
                            <button type="button" class="btn" id="liveToastBtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </svg></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="toast-container position-fixed">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <?php if (!isset($_COOKIE['session'])) { ?>
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
                    <div class="error"><?php echo isset($error) ? $error : ''; ?></div>
                <?php } else {
                    require_once("../Controller/session.php");
                    $userBL = new Session;
                    $userData = $userBL->getUserData($_COOKIE['session']);
                ?>
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
                    <a class="btn btn-primary" href="../Controller/logout.php" role="button">Cerrar Sesión</a>
                    <a class="btn btn-primary float-end" href="./reservation.php" role="button">Reserva ya</a>
                <?php } ?>
            </div>
        </div>
    </header>

    <div class="container-xxl">
        <section class="banner">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../img/photo1.jpg" alt="Los Angeles" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                        <img src="../../img/photo2.jpg" alt="Chicago" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                        <img src="../../img/photo3.jpg" alt="New York" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                        <img src="../../img/photo5.jpg" alt="New York" class="d-block" style="width:100%">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </section>

        <section class="about">
            <div class="article">
                <h3 class="title">Our Chef</h3>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem.
                    Aliquam erat volutpat.</p>
            </div>
            <div class="article">
                <h3 class="title">The Restaurant</h3>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem.
                    Aliquam erat volutpat.</p>
            </div>
            <div class="article">
                <h3 class="title">Our Menu</h3>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem.
                    Aliquam erat volutpat.</p>
            </div>

        </section>

    </div>

    <footer>
        <div class="container">
            <p style="margin: auto;">&copy; 2023 Crew Bar. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>