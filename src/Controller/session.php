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
        try {
            $res = $userDAL->registerNewUser($user, $name, $surname, $email, $phone, $birth, $psswd, PROFILE);
            return $res;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
