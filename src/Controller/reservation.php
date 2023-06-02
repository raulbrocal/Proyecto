<?php

require_once("../Model/reservation.php");

class ReservationLogic
{
    function __construct()
    {
    }

    public function reserveTable($userId, $startTime, $date, $numberOfPeople)
    {
        $resrvationDAL = new Reservation();
        $res = $resrvationDAL->checkAvailability($numberOfPeople, $startTime);
        if ($res) {
            $resrvationDAL->updateAvailability($res);
            $resrvationDAL->insertReservation($userId, $res, $date, $startTime, $numberOfPeople);
            return true; // Reserva realizada exitosamente
        } else {
            return false; // No hay disponibilidad para la reserva
        }
    }
}
