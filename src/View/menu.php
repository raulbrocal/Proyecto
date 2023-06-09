<?php
require_once("../Business/info.php");
$infoBL = new RestaurantInfo;
$info = $infoBL->getRestaurantData();

if (isset($_POST['action']) && $_POST['action'] == "login") {
    require_once("../Business/login.php");
    $loginBL = new Login;
    $res = $loginBL->login($_POST['user'], $_POST['psswrd']);
    if (!$res) {
        $alert = 'error';
    }
}
if (isset($_COOKIE['session'])) {
    require_once("../Business/session.php");
    $userBL = new Session;
    $userData = $userBL->getUserData($_COOKIE['session']);
    $reservationData = $userBL->getReservation($_COOKIE['session']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestra carta</title>
    <link rel="icon" href="../../img/logo.png">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/login.js"></script>
    <style>
        #navbarMenu {
            position: fixed;
            top: 6.5%;
            left: 0;
            width: 100%;
            background-color: rgba(200, 200, 200, 0.8);
            z-index: 999;
            text-align: center;
            padding: 10px 0;
        }

        .plate-icon {
            width: 5%;
            height: 5%;
            margin-right: 5%;
        }

        .category-link {
            display: inline-block;
            position: relative;
            padding: 8px 16px;
            text-decoration: none;
            color: #000;
            transition: all 0.3s ease;
            margin-right: 5%;
        }

        .category-link:last-child {
            margin-right: 0;
        }

        .category-link::before,
        .category-link::after {
            content: '';
            display: block;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 4px;
            background-color: #000;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .category-link::before {
            left: -2%;
        }

        .category-link::after {
            right: -10px;
        }

        .category-link:hover::before {
            left: -20px;
        }

        .category-link:hover::after {
            right: -20px;
        }


        .category {
            margin: auto;
            width: 85%;
        }

        .item {
            margin-bottom: 5px;
        }

        #cuadrado {
            width: 30%;
            height: 150px;
            background-color: white;
            padding-left: 0;
        }

        #objeto {
            width: 25%;
            border-radius: 5px;
            border-left: #666 solid 5px;
            border-top: #666 solid 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: inline-block;
            margin: 50px 50px 50px 50px;
            background-color: #f1f1f1;
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
                            <tr>
                                <td colspan="3"><?php echo "Número de reservas realizadas: " . $reservationData['totalReservations']; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="toast-body">
                        <?php if ($reservationData['lastReservation']) { ?>
                            <p><strong>Próxima reserva:</strong>
                            <ul>
                                <li>Fecha y Hora: <?php echo date('h:i - d/m/Y', strtotime($reservationData['lastReservation']['date'] . ' ' . $reservationData['lastReservation']['time'])); ?></li>
                                <li>N° de mesa: <?php echo $reservationData['lastReservation']['table_number']; ?></li>
                            </ul>
                            </p>
                        <?php } ?>
                        <p><strong>Cumpleaños:</strong> <?php echo $userData['birth_date']; ?></p>
                        <p><strong>Teléfono:</strong> <?php echo $userData['phone']; ?></p>
                    </div>
                    <a class="btn btn-primary" href="../Business/logout.php" role="button">Cerrar Sesión</a>
                    <a class="btn btn-primary float-end" href="./reservation.php" role="button">Reserva ya</a>
                <?php } ?>
            </div>
        </div>
    </header>

    <main style="text-align: center;">

        <div id="navbarMenu">
            <a href="#" class="category-link active" data-category="beverages">BEBIDAS</a>
            <a href="#" class="category-link" data-category="appetizers">ENTRANTES</a>
            <img src="../../img/plateIcon.svg" alt="PlateIcon" class="plate-icon">
            <a href="#" class="category-link" data-category="food">COMIDA</a>
            <a href="#" class="category-link" data-category="desserts">POSTRES</a>
        </div>
        <br><br><br><br><br>
        <div id="main">
            <?php require_once(dirname(__DIR__) . "/Business/Menu/drink.php"); ?>
            <div id="beverages" class="category">
                <?php $drinksBL = new Beverage();
                $drinksBL->getDrinks() ?>
                <br><br><br><br><br>
            </div>
            <?php require_once(dirname(__DIR__) . "/Business/Menu/starters.php"); ?>
            <div id="appetizers" class="category">
                <h2>Entrantes</h2>
                <?php $startersBL = new Appetizer();
                $startersBL->getStarters() ?>
                <br><br><br><br><br>
            </div>
            <?php require_once(dirname(__DIR__) . "/Business/Menu/food.php"); ?>
            <div id="food" class="category">
                <?php $foodBL = new Meal();
                $foodBL->getFoods() ?>
                <br><br><br><br><br>
            </div>
            <?php require_once(dirname(__DIR__) . "/Business/Menu/dessert.php"); ?>
            <div id="desserts" class="category">
                <h2>Postres</h2>
                <?php $dessertBL = new Afters();
                $dessertBL->getDesserts() ?>
                <br><br><br><br><br>
            </div>
        </div>

    </main>

    <footer>
        <div class="container">
            <p style="margin: auto;">&copy; 2023 <?php echo $info['name'] ?>&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp+34 <?php echo $info["phone"] ?></p>
        </div>
    </footer>

    <?php if (isset($alert)) {
        echo $infoBL->getResponse($alert);
    }
    ?>

</body>

</html>