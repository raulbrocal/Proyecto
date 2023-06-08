<?php
$cookieParams = session_get_cookie_params();

setcookie('session', '', time() - 1, $cookieParams['path'], $cookieParams['domain'], true, true);

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
exit();