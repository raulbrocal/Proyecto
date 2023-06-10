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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $info['name'] ?></title>
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
    <script src="../../js/map.js"></script>
    <script src="../../js/index.js"></script>
    <style>
        #map {
            height: 500px;
            width: 100%;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .info {
            display: flex;
            justify-content: space-between;
            margin-top: 4%;
            margin-bottom: 4%;
        }

        .info div {
            width: 45%;
            padding: 20px;
            float: left;
            background-color: #F7F7F7;
            text-align: center;
        }
    </style>
</head>

<body id="content">
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
                <h3 class="title">Ven a visitarnos</h3>
                <br>
                <p><strong>Abierto:</strong> <?php echo $info["closing_day"] ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>Horario:</strong> <?php echo $info["opening_time"] ?>h - <?php echo $info["closing_time"] ?>h</p>
                <p><?php echo $info["address"] ?>,&nbsp&nbsp<?php echo $info["city"] ?>&nbsp-&nbsp<?php echo $info["country"] ?></p>
            </div>
            <div class="article">
                <h3 class="title">Bienvenido al restaurante</h3>
                <p style="margin-top: 5%;">Todo un lugar acogedor y especial para disfrutar de momentos únicos. <br>
                    Te esperamos con los brazos bien abiertos.</p>
            </div>
            <div class="article">
                <h3 class="title">Contacta con nosotros</h3>
                <br>
                <a href="https://www.facebook.com/crewbarportadriano" class="btn btn-secondary" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>&nbspFacebook
                </a>
                <a href="https://www.instagram.com/crewbar/" class="btn btn-secondary" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg> Instagram
                </a>
                <a href="https://www.tripadvisor.es/Attraction_Review-g580293-d5909982-Reviews-Crew_Bar-Calvia_Majorca_Balearic_Islands.html" class="btn btn-secondary" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                    </svg></i> Tripadvisor
                </a>
                <p style="margin-top: 4%;"><?php echo $info["email"] ?></p>
            </div>

        </section>

        <div id="map"></div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8x2L4ypAtuKgz7xFc9jE9wlo0dgxq9cY&callback=initMap" defer></script>

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