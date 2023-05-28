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

    function verify($user, $psswrd)
    {
        $connection = $this->connection();
        $stmt = mysqli_prepare($connection, "SELECT user_id, password, profile FROM user where user_id = ?;");
        $sanitized_user = mysqli_real_escape_string($connection, $user);
        $stmt->bind_param("s", $sanitized_user);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows == 0) {
            return 'NOT_FOUND';
        }

        if ($res->num_rows > 1) {
            return 'NOT_FOUND';
        }

        $myrow = $res->fetch_assoc();
        $x = $myrow['password'];
        if (password_verify($psswrd, $x)) {
            return $myrow['profile'];
        } else {
            return 'NOT_FOUND';
        }
    }
}
