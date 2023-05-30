<?php

require_once("../Model/reservation.php");

class ReservationLogic
{
    function __construct()
    {
    }

    function registerNewReservation($user_id, $date, $time, $number_of_people)
    {
        $reservationDAL = new Reservation();
        $res = $reservationDAL->insertReservation($user_id, $date, $time, $number_of_people);
        if ($res === false) {
            $alert = '<script type="text/javascript">alert("Clave duplicada. Por favor, inténtalo de nuevo.");</script>';
            return $alert;
        }
        return $res;
    }
}
