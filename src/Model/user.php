<?php

require_once("../Model/connection.php");

class User
{
    function connection()
    {
        try {
            return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            die("Could not connect to database:" . $e->getMessage());
        }
    }
    function registerNewUser($user, $name, $surname, $email, $phone, $birth, $psswd, $profile)
    {
        $connection = $this->connection();
        $stmt = mysqli_prepare($connection, "INSERT INTO user (user, name, surname, email, phone, birth_date, password, profile) VALUES (?,?,?,?,?,?,?,?);");
        $hash = password_hash($psswd, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssssss", $user, $name, $surname, $email, $phone, $birth, $hash, $profile,);
        $res = $stmt->execute();

        return $res;
    }
}
