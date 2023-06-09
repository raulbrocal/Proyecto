<?php

require_once("../DataAccess/user.php");

class Login
{

    private $userDAL;

    public function __construct()
    {
        $this->userDAL = new User();
    }

    public function login($user, $psswrd)
    {
        if ($this->verify($user, $psswrd) !== 'NOT_FOUND') {
            $this->setSessionCookie($user);
            $this->redirectBack();
        } else {
            return false;
        }
    }

    private function setSessionCookie($user)
    {
        $cookieParams = session_get_cookie_params();
        $secure = true;
        $httponly = true;
        setcookie('session', $user, time() + 86400, $cookieParams['path'], $cookieParams['domain'], $secure, $httponly);
    }

    private function redirectBack()
    {
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
        exit();
    }

    private function verify($user, $psswrd)
    {
        $res = $this->userDAL->verify($user, $psswrd);
        return $res;
    }
}
