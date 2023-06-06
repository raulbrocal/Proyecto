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

    function checkAvailability($date, $time, $tableNumber)
    {
        $connection = $this->connection();

        $query = "SELECT schedule_id, table_number, time, date FROM reservationSchedule WHERE date = ? AND time = ? AND table_number = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ssi", $date, $time, $tableNumber);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            return false; // No se puede realizar la reserva, la mesa está ocupada en esa fecha y hora
        }

        // Realizar inserción en la tabla reservationSchedule
        $insertedID = $this->insertReservationSchedule($tableNumber, $time, $date);
        mysqli_close($connection);
        return $insertedID; // Devolver el ID de la fila recién insertada
    }



    function getTables($numberOfPeople)
    {
        $connection = $this->connection();

        $query = "SELECT number FROM dinnerTable WHERE capacity >= ? ORDER BY capacity ASC";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $numberOfPeople);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        $tables = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $tables[] = $row['number'];
        }

        return $tables;
    }


    function insertReservationSchedule($tableNumber, $time, $date)
    {
        $connection = $this->connection();

        $query = "INSERT INTO reservationSchedule (table_number, time, date) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "iss", $tableNumber, $time, $date);
        mysqli_stmt_execute($stmt);

        $insertedID = mysqli_stmt_insert_id($stmt); // Obtener el ID de la fila recién insertada

        mysqli_stmt_close($stmt);
        mysqli_close($connection);

        return $insertedID;
    }

    function insertReservation($userId, $scheduleId, $numberOfPeople)
    {
        $connection = $this->connection();
        // Insertar la reserva en la tabla reservation
        $insertQuery = "INSERT INTO reservation (user_id, schedule_id, number_of_people)
                    VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connection, $insertQuery);
        mysqli_stmt_bind_param($stmt, "sii", $userId, $scheduleId, $numberOfPeople);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    }
}
