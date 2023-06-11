<?php

require_once("../DataAccess/info.php");

// Array de días de la semana y sus equivalentes
define('DAYS_OF_WEEK', serialize([
    'Domingo' => 'Lunes - Sábado',
    'Lunes' => 'Martes - Domingo',
    'Martes' => 'Miércoles - Lunes',
    'Miércoles' => 'Jueves - Martes',
    'Jueves' => 'Viernes - Miércoles',
    'Viernes' => 'Sábado - Jueves',
    'Sábado' => 'Domingo - Viernes'
]));

class RestaurantInfo
{
    private $infoDAL;

    public function __construct()
    {
        $this->infoDAL = new Info();
    }

    public function getRestaurantData()
    {
        $array = $this->infoDAL->getRestaurantData();
        $res = $array[0];

        // Formatear las columnas opening_day y closing_day en el formato "hh:mm"
        $res['opening_time'] = date('H:i', strtotime($res['opening_time']));
        $res['closing_time'] = date('H:i', strtotime($res['closing_time']));

        // Deserializar la constante DAYS_OF_WEEK
        $daysOfWeek = unserialize(DAYS_OF_WEEK);
        // Verificar si el valor de closing_day está en el array y reemplazarlo
        if (isset($daysOfWeek[$res['closing_day']])) {
            $res['closing_day'] = $daysOfWeek[$res['closing_day']];
        }

        return $res;
    }

    function getResponse($param)
    {
        $output = '';

        switch ($param) {
            case "error":
                $error = "Credenciales inválidas. Por favor, inténtalo de nuevo.";
                $output .= '<div id="containerDiv" class="error">';
                $output .= '    <div>';
                $output .= '        <h3><b>Error</b></h3>';
                $output .= '    </div>';
                $output .= '    <div id="message">' . $error . '</div>';
                $output .= '</div>';
                $output .= '<script>setTimeout(hide, 3000);</script>';
                break;
            case "successful":
                $message = "Su reserva ha sido realizzada. Para saber más póngase en contacto con nosotros.";
                $output .= '<div id="containerDiv" class="successful">';
                $output .= '    <div>';
                $output .= '        <h3><b>Enhorabuena!</b></h3>';
                $output .= '    </div>';
                $output .= '    <div id="message">' . $message . '</div>';
                $output .= '</div>';
                $output .= '<script>setTimeout(hide, 3000);</script>';
                break;
            case "not_possible":
                $message = "Su petición para dichas fechas no están disponibles. Porfavor, inténtelo de nuevo.";
                $output .= '<div id="containerDiv" class="retry">';
                $output .= '    <div>';
                $output .= '        <h3><b>No disponible</b></h3>';
                $output .= '    </div>';
                $output .= '    <div id="message">' . $message . '</div>';
                $output .= '</div>';
                $output .= '<script>setTimeout(hide, 3000);</script>';
                break;
            default:
                $output = 'Opción no válida';
                break;
        }

        return $output;
    }
}
