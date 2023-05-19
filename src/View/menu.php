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
    <script src="../../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
        /* Estilos CSS para los botones de categorías */
        .category-button {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 100px;
            background-color: #ccc;
            text-decoration: none;
            border-radius: 5px;
            background-size: cover;
            border-bottom: 1px solid transparent;
            cursor: pointer;
            width: 100px;
            height: 50px;
        }

        .category-button.active {
            border-bottom-color: #666;
        }

        .item {
            margin-bottom: 5px;
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
                        <li class="nav1-item">
                            <a href="user.php"><button type="button" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg></button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main style="text-align: center;">
        <h2 class="menu-title">Estás en la zona de menú</h2>

        <div class="navbar navbar-expand-lg shadow-0 border-bottom border-top border-dark justify-content-center" id="navbarMenu">
        </div>

        <div id="main">
            <div id="beverages" class="category">
                <h2>Bebidas</h2>
                <div class="item">Bebida 1</div>
                <div class="item">Bebida 2</div>
                <div class="item">Bebida 3</div>
            </div>

            <div id="food" class="category">
                <h2>Comida</h2>
                <div class="item">Comida 1</div>
                <div class="item">Comida 2</div>
                <div class="item">Comida 3</div>
            </div>

            <div id="appetizers" class="category">
                <h2>Entrantes</h2>
                <div class="item">Entrante 1</div>
                <div class="item">Entrante 2</div>
                <div class="item">Entrante 3</div>
            </div>

            <div id="desserts" class="category">
                <h2>Postres</h2>
                <div class="item">Postre 1</div>
                <div class="item">Postre 2</div>
                <div class="item">Postre 3</div>
            </div>
        </div>

    </main>

    <footer>
        <div class=" container">
            <p class="text" style="text-align: center;">&copy; 2023 Crew Bar. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>