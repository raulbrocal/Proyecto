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
            $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (!$connection) {
                throw new Exception("Could not connect to the database.");
            }
            return $connection;
        } catch (Exception $e) {
            throw new Exception("Could not connect to the database: " . $e->getMessage());
        }
    }

    public function getTable($table)
    {
        $connection = $this->connection();

        if (array_key_exists($table, $this->tablesBBDD)) {
            $fields = implode(', ', $this->tablesBBDD[$table]);

            $query = "SELECT $fields FROM $table";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $tableData = array();
                $tableData[] = $this->tablesBBDD[$table];

                while ($row = mysqli_fetch_assoc($result)) {
                    $tableData[] = $row;
                }

                mysqli_stmt_close($stmt);
                mysqli_close($connection);

                return $tableData;
            } else {
                mysqli_stmt_close($stmt);
                mysqli_close($connection);

                // Crear un array con los nombres de las columnas
                $columnNames = array();
                foreach ($this->tablesBBDD[$table] as $columnName) {
                    $columnNames[] = $columnName;
                }

                $emptyTableData = array($columnNames);

                return $emptyTableData;
            }
        } else {
            return null;
        }
    }

    public function deleteRow($tabla, $id, $idName)
    {
        $connection = $this->connection();

        $sql = "DELETE FROM $tabla WHERE $id = '$idName'";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_execute($stmt);

        $affectedRows = mysqli_stmt_affected_rows($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);

        return $affectedRows > 0;
    }

    public function insertRow($table, $data, $columns)
    {
        $connection = $this->connection();
        $columnNames = implode(', ', $columns);
        $columnValues = implode(', ', array_fill(0, count($columns), '?'));

        $sql = "INSERT INTO $table ($columnNames) VALUES ($columnValues)";
        $stmt = mysqli_prepare($connection, $sql);

        // Bind values dynamically
        $types = '';
        $bindParams = [];
        foreach ($data as $value) {
            if (is_numeric($value)) {
                $types .= 'i'; // Integer
            } else {
                $types .= 's'; // String
            }
            $bindParams[] = $value;
        }

        array_unshift($bindParams, $stmt, $types);
        call_user_func_array('mysqli_stmt_bind_param', $bindParams);

        mysqli_stmt_execute($stmt);

        $affectedRows = mysqli_stmt_affected_rows($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($connection);

        return $affectedRows > 0;
    }
}
