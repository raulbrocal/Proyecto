<?php

require_once("connection.php");

class Reservation
{
    function connection()
    {
        try {
            return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            return ("Could not connect to database:" . $e->getMessage());
        }
    }

    function insertReservation($user_id, $date, $time, $number_of_people)
    {
        $connection = $this->connection();
        $stmt = mysqli_prepare($connection, "INSERT INTO reservation (user_id, date, time, number_of_people) VALUES (?,?,?,?);");
        $stmt->bind_param("ssss", $user_id, $date, $time, $number_of_people);
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
