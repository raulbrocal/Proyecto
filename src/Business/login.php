<?php
class Login
{
    function login($user, $psswrd)
    {
        if (!($this->verify($user, $psswrd) == 'NOT_FOUND')) {
            // Establecer la cookie de sesión con el identificador único y otras configuraciones
            $cookieParams = session_get_cookie_params();
            $secure = true; // Indica que la cookie solo se enviará a través de conexiones HTTPS
            $httponly = true; // Indica que la cookie no será accesible desde scripts del lado cliente
            setcookie('session', $user, time() + 86400, $cookieParams['path'], $cookieParams['domain'], $secure, $httponly);
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
            exit();
        } else {
            return false;
        }
    }


    function verify($user, $psswrd)
    {
        require_once("../DataAccess/user.php");
        $userDAL = new User();
        $res = $userDAL->verify($user, $psswrd);

        return $res;
    }
}
