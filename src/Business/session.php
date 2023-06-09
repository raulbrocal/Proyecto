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
        return $res;
    }

    public function getUserData($user)
    {
        $userDAL = new User();
        $res = $userDAL->getUser($user);
        return $res;
    }
}