<?php

require_once(dirname(__DIR__) . "/connection.php");

class Food
{
    function connection()
    {
        try {
            return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            return ("Could not connect to database:" . $e->getMessage());
        }
    }
    function getFood()
    {
        $conn = $this->connection();
        $stmt = "SELECT name, description, allergens, price, type FROM dishes WHERE type <> 'entrante' ORDER BY
          CASE
            WHEN type LIKE '%carne%' THEN 1
            WHEN type LIKE '%pescado%' THEN 2
            WHEN type LIKE '%pizza%' THEN 3
            ELSE 4
          END,
          name;";
        $res = $conn->query($stmt);
        $food = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $food[] = $row;
            }
        }
        $conn->close();
        return $res;
    }
}
