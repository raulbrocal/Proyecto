<?php

require_once("../DataAccess/user.php");

define('PROFILE', 'client');
class Session
{
    public function __construct()
    {
    }

    public function registerNewUser($user, $name, $surname, $email, $phone, $birth, $psswd)
    {
        $userDAL = new User();
        $res = $userDAL->registerNewUser($user, $name, $surname, $email, $phone, $birth, $psswd, PROFILE);
        if ($res) {
            require_once("login.php");
            $login = new Login;
            $login->login($user, $psswd);
            return $res;
        }
    }

    public function getUserData($user)
    {
        $userDAL = new User();
        $res = $userDAL->getUser($user);
        return $res;
    }
}
