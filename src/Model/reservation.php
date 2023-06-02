<?php

require_once("connection.php");

class Reservation
{
    public function connection()
    {
        try {
            return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            return ("Could not connect to database:" . $e->getMessage());
        }
    }

    function checkAvailability($numberOfPeople, $startTime)
    {
        $connection = $this->connection();
        $query = "SELECT rs.schedule_id FROM reservationSchedule rs LEFT JOIN dinnerTable dt ON dt.number = rs.table_number WHERE dt.capacity >= ? AND rs.start_time >= ? LIMIT 1;";

        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "is", $numberOfPeople, $startTime);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            return $row['schedule_id']; // Devuelve el número de mesa disponible
        } else {
            return false; // No hay mesas disponibles
        }
    }

    function updateAvailability($scheduleID)
    {
        $connection = $this->connection();
        // Cambiar availability a false
        $updateQuery = "UPDATE reservationSchedule SET availability = FALSE WHERE schedule_id = ?";

        $stmt = mysqli_prepare($connection, $updateQuery);
        mysqli_stmt_bind_param($stmt, "i", $scheduleID);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    }

    function insertReservation($userId, $scheduleId, $date, $startTime, $numberOfPeople)
    {
        $connection = $this->connection();
        // Insertar la reserva en la tabla reservation
        $insertQuery = "INSERT INTO reservation (user_id, schedule_id, date, time, number_of_people)
                    VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $insertQuery);
        mysqli_stmt_bind_param($stmt, "sissi", $userId, $scheduleId, $date, $startTime, $numberOfPeople);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    }
}
