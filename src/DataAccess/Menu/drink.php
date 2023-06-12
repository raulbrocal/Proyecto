<?php

require_once(dirname(__DIR__) . "/connection.php");

class Drink
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

    public function getDrinks()
    {
        $connection = $this->connection();
        $query = "SELECT name, ml, price, type FROM drink ORDER BY
          CASE
            WHEN type = 'Refresco' THEN 1
            WHEN type = 'Cóctel' THEN 2
            WHEN type LIKE 'Vino tinto%' THEN 3
            WHEN type LIKE 'Vino blanco%' THEN 4
            WHEN type LIKE 'Vino dulce%' THEN 5
            ELSE 6
          END,
          CASE
            WHEN type LIKE 'Vino%' THEN price
            ELSE NULL
          END ASC,
          name";
        $statement = mysqli_prepare($connection, $query);

        if (!$statement) {
            throw new Exception("Error executing the database query.");
        }

        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        if (!$result) {
            throw new Exception("Error retrieving data from the database.");
        }

        $drinks = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $drinks[] = $row;
        }

        mysqli_stmt_close($statement);
        mysqli_close($connection);

        return $drinks;
    }
}
