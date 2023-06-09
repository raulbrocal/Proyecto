<?php

require_once("connection.php");

class Info
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
    function getRestaurantData()
    {
        $connection = $this->connection();

        // Consulta SQL para obtener los datos de la tabla "restaurant"
        $query = "SELECT name, address, city, country, phone, email, closing_day, opening_time, closing_time FROM restaurant";
        $result = mysqli_query($connection, $query);

        // Comprobar si se obtuvieron resultados
        if (mysqli_num_rows($result) > 0) {
            // Array para almacenar los datos de los restaurantes
            $restaurantData = array();

            // Obtener los datos de cada fila y guardarlos en el array
            while ($row = mysqli_fetch_assoc($result)) {
                $restaurantData[] = $row;
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($connection);

            return $restaurantData;
        } else {
            // No se encontraron registros en la tabla "restaurant"
            mysqli_close($connection);
            return array();
        }
    }
}
