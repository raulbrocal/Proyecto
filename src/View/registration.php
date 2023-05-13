<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Únete a nosotros</title>
    <link rel="icon" href="../../img/logo.png">
    <link rel="stylesheet" href="../../css/registration.css">
    <script src="../../js/registration.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
                            <a href="#"><button type="button" class="btn" id="translate_button">ES</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
            <input type="date" name="birth" id="birth" required><br>
            <label for="phone">Número de teléfono</label><br>
            <input type="text" id="phone" name="phone" maxlength="10" required><br>
            <label for="username">Usuario</label><br>
            <input type="text" id="username" name="username" placeholder="usuario_123" autofocus maxlength="20" required><br>
            <label for="password">Contraseña</label><br>
            <input type="password" name="password" id="password" placeholder="8-10 caracteres" required>
            <button type="submit" name="submit" id="submit" disabled>Enviar</button>
        </form>
    </main>

    <div id="telon">
        <div id="mensaje">
            <p>Los datos se han enviado correctamente</p>
        </div>
    </div>

    <footer>
        <div class="container">
            <p class="text" style="text-align: center;">&copy; 2023 Crew Bar. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>