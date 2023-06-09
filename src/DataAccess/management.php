<?php

require_once("connection.php");

class DatabaseSchema
{
    private $tablesBBDD;

    public function __construct()
    {
        $this->tablesBBDD = array(
            'restaurant' => array(
                'name',
                'address',
                'city',
                'country',
                'phone',
                'email',
                'closing_day',
                'opening_time',
                'closing_time'
            ),
            'user' => array(
                'user_id',
                'name',
                'surname',
                'email',
                'phone',
                'birth_date',
                'password',
                'profile'
            ),
            'dinnerTable' => array(
                'number',
                'capacity'
            ),
            'reservationSchedule' => array(
                'schedule_id',
                'table_number',
                'time',
                'date'
            ),
            'reservation' => array(
                'reservation_id',
                'user_id',
                'schedule_id',
                'number_of_people'
            ),
            'drink' => array(
                'drink_id',
                'name',
                'ml',
                'price',
                'type',
                'alcoholic'
            ),
            'dishes' => array(
                'dishes_id',
                'name',
                'description',
                'price',
                'type',
                'allergens'
            ),
            'dessert' => array(
                'dessert_id',
                'name',
                'description',
                'price',
                'allergens'
            )
        );
    }

    private function connection()
    {
        try {
            return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            return ("Could not connect to database:" . $e->getMessage());
        }
    }

    public function getTable($table)
    {
        $connection = $this->connection();

        // Comprobar si la tabla existe en el array de tablas
        if (array_key_exists($table, $this->tablesBBDD)) {
            $fields = implode(', ', $this->tablesBBDD[$table]);

            // Consulta SQL para obtener los datos de la tabla especificada
            $query = "SELECT $fields FROM $table";
            $result = mysqli_query($connection, $query);

            // Comprobar si se obtuvieron resultados
            if (mysqli_num_rows($result) > 0) {
                // Array bidimensional para almacenar los datos de la tabla
                $tableData = array();

                // Agregar el encabezado de las columnas al array bidimensional
                $tableData[] = $this->tablesBBDD[$table];

                // Obtener los datos de cada fila y guardarlos en el array bidimensional
                while ($row = mysqli_fetch_assoc($result)) {
                    $tableData[] = $row;
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($connection);

                return $tableData;
            } else {
                // No se encontraron registros en la tabla
                mysqli_close($connection);
                return array();
            }
        } else {
            // La tabla no existe en el array de tablas
            return null;
        }
    }

    function deleteRow($tabla, $id)
    {
        $connection = $this->connection();

        // Consulta para eliminar la fila de la tabla
        $sql = "DELETE FROM $tabla WHERE id = '$id'";

        // Ejecutar la consulta
        if (mysqli_query($connection, $sql)) {
            // Cerrar la conexión
            mysqli_close($connection);
            return true;
        } else {
            // Cerrar la conexión
            mysqli_close($connection);
            return false;
        }
    }
}
