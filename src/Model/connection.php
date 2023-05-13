<?php
try {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '1234');
    define('DB_NAME', 'restaurant');

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    return $conn;
} catch (Exception $e) {
    die("Could not connect to database:" . $e->getMessage());
}
