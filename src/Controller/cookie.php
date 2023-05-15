<?php
// Set cookie expiration time to 1 day
$expiration_time = time() + 86400;

if (isset($_POST['username']) && isset($_POST['password'])) {

    // Check user credentials
    if ($_POST['username'] == 'correct_username' && $_POST['password'] == 'correct_password') {
        // Set cookie with secure and HttpOnly flags
        setcookie('login', 'value', $expiration_time, '/', '', true, true);
        header('Location: restricted_content.php');
    } else {
        // Invalid credentials
        header('Location: login.php?error=invalid_credentials');
    }

} elseif (isset($_COOKIE['login'])) {

    // Cookie exists, allow access to restricted content
    header('Location: restricted_content.php');

} else {

    // No cookie, redirect to login page
    header('Location: ../View');

}
