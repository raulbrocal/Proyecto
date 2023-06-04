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
        return $res;
    }

    function getUserData($user)
    {
        $userDAL = new User();
        $res = $userDAL->getUser($user);
        return $res;
    }
}
