<?php

require_once(dirname(__DIR__) . "/connection.php");

class Starter
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

    public function getStarters()
    {
        $connection = $this->connection();
        $query = "SELECT name, description, allergens, price FROM dishes WHERE type = 'entrante' ORDER BY name";
        $statement = mysqli_prepare($connection, $query);
        if (!$statement) {
            throw new Exception("Error executing the database query.");
        }

        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        if (!$result) {
            throw new Exception("Error retrieving data from the database.");
        }

        $starters = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $starters[] = $row;
        }

        mysqli_stmt_close($statement);
        mysqli_close($connection);

        return $starters;
    }
}
