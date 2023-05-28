<?php

require_once("connection.php");

class User
{
    function connection()
    {
        try {
            return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            return ("Could not connect to database:" . $e->getMessage());
        }
    }
    function registerNewUser($user, $name, $surname, $email, $phone, $birth, $psswd, $profile)
    {
        $connection = $this->connection();
        $stmt = mysqli_prepare($connection, "INSERT INTO user (user_id, name, surname, email, phone, birth_date, password, profile) VALUES (?,?,?,?,?,?,?,?);");
        $hash = password_hash($psswd, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssssss", $user, $name, $surname, $email, $phone, $birth, $hash, $profile);
        try {
            $res = $stmt->execute();
            return $res;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                return false;
            } else {
                throw $e;
            }
        }
    }
}
