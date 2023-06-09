<?php

require_once("../DataAccess/reservation.php");

class ReservationLogic
{
    public function __construct()
    {
    }

    public function reserveTable($userId, $time, $date, $numberOfPeople)
    {
        $reservationDAL = new Reservation();
        $tables = $reservationDAL->getTables($numberOfPeople);
        $scheduleID = null;

        foreach ($tables as $tableNumber) {
            $availability = $reservationDAL->checkAvailability($date, $time, $tableNumber);
            if ($availability !== false) {
                $scheduleID = $availability;
                break;
            }
        }

        // Obtener la hora actual
        $currentTime = date('H:i');

        if ($scheduleID !== null && !($date == date('Y-m-d') && $time < $currentTime)) {
            $reservationDAL->insertReservation($userId, $scheduleID, $numberOfPeople);
            return true; // Reserva realizada exitosamente
        } else {
            return false; // No hay disponibilidad para la reserva o tiempo incorrecto
        }
    }
}
