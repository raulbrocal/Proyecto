<?php

require_once("connection.php");

class User
{
    private function connection()
    {
        try {
            $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (!$connection) {
                throw new Exception("Could not connect to the database.");
            }
            return $connection;
        } catch (Exception $e) {
            throw new Exception("Could not connect to the database: " . $e->getMessage());
        }
    }

    public function registerNewUser($user, $name, $surname, $email, $phone, $birth, $psswd, $profile)
    {
        $connection = $this->connection();

        // Validar datos de entrada
        if (!$this->validateUserData($user, $name, $surname, $email, $phone, $birth, $psswd, $profile)) {
            return false;
        }

        $stmt = mysqli_prepare($connection, "INSERT INTO user (user_id, name, surname, email, phone, birth_date, password, profile) VALUES (?,?,?,?,?,?,?,?);");
        $hash = password_hash($psswd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssssss", $user, $name, $surname, $email, $phone, $birth, $hash, $profile);

        try {
            $res = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($connection);
            return $res;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                return false;
            } else {
                throw $e;
            }
        }
    }

    public function verify($user, $psswrd)
    {
        $connection = $this->connection();

        $stmt = mysqli_prepare($connection, "SELECT user_id, password, profile FROM user WHERE user_id = ?;");
        mysqli_stmt_bind_param($stmt, "s", $user);

        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if ($res->num_rows != 1) {
            mysqli_stmt_close($stmt);
            mysqli_close($connection);
            return 'NOT_FOUND';
        }

        $myrow = $res->fetch_assoc();
        $hashedPassword = $myrow['password'];

        if (password_verify($psswrd, $hashedPassword)) {
            mysqli_stmt_close($stmt);
            mysqli_close($connection);
            return $myrow['profile'];
        } else {
            mysqli_stmt_close($stmt);
            mysqli_close($connection);
            return 'NOT_FOUND';
        }
    }

    public function getUser($user)
    {
        $connection = $this->connection();

        $stmt = mysqli_prepare($connection, "SELECT name, surname, email, phone, birth_date, profile FROM user WHERE user_id = ?;");
        mysqli_stmt_bind_param($stmt, "s", $user);

        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = $res->fetch_assoc();

        mysqli_stmt_close($stmt);
        mysqli_close($connection);

        return $row;
    }

    private function validateUserData($user, $name, $surname, $email, $phone, $birth, $psswd, $profile)
    {
        // Realiza la validación de los datos de entrada según tus requisitos
        // Si algún dato no cumple con las validaciones, devuelve false
        // De lo contrario, devuelve true
        if (empty($user) || empty($name) || empty($surname) || empty($email) || empty($phone) || empty($birth) || empty($psswd) || empty($profile)) {
            return false;
        }

        return true;
    }
}
