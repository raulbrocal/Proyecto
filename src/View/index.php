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

    <section class="container-fluid title">
        <h1>Crew Bar</h1>
    </section>

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

        <footer>
            <div class="container">
                <p class="text" style="text-align: center;">&copy; 2023 Crew Bar. All rights reserved.</p>
            </div>
        </footer>

    </div>

</body>

</html>