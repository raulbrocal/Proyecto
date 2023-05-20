<?php

require_once(dirname(__DIR__) . "/connection.php");

class Drink
{
    function connection()
    {
        try {
            return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            die("Could not connect to database:" . $e->getMessage());
        }
    }
    function getDrinks()
    {
        $conn = $this->connection();
        $stmt = "SELECT name, ml, price, type FROM drink ORDER BY
          CASE
            WHEN type = 'Refresco' THEN 1
            WHEN type = 'Cóctel' THEN 2
            WHEN type LIKE 'Vino tinto%' THEN 3
            WHEN type LIKE 'Vino blanco%' THEN 4
            WHEN type LIKE 'Vino rosado%' THEN 5
            WHEN type LIKE 'Vino dulce%' THEN 6
            WHEN type LIKE 'Vino fortificado%' THEN 7
            WHEN type LIKE 'Vino aromatizado%' THEN 8
            ELSE 9
          END,
          CASE
            WHEN type LIKE 'Vino%' THEN price
            ELSE NULL
          END DESC,
          name;";
        $res = $conn->query($stmt);
        $drinks = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $drinks[] = $row;
            }
        }
        $conn->close();
        return $res;
    }
}
