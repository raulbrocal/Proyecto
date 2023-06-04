<?php

require_once("../Model/user.php");

class Session
{
    function __construct()
    {
        define('PROFILE', 'client');
    }

    function registerNewUser($user, $name, $surname, $email, $phone, $birth, $psswd)
    {
        $userDAL = new User();
        $res = $userDAL->registerNewUser($user, $name, $surname, $email, $phone, $birth, $psswd, PROFILE);

        if ($res === false) {
            $alert = '<script type="text/javascript">alert("Clave duplicada. Por favor, inténtalo de nuevo.");</script>';
            return $alert;
        }
        return $res;
    }

    function getUserData($user)
    {
        $userDAL = new User();
        $res = $userDAL->getUser($user);
        return $res;
    }
}
