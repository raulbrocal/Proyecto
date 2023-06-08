<?php

require_once(dirname(__DIR__) . "/connection.php");

class Starter
{
    function connection()
    {
        try {
            return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            return ("Could not connect to database:" . $e->getMessage());
        }
    }
    function getStarters()
    {
        $conn = $this->connection();
        $stmt = "SELECT name, description, allergens, price FROM dishes WHERE type = 'entrante' ORDER BY name;";
        $res = $conn->query($stmt);
        $starters = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $starters[] = $row;
            }
        }
        $conn->close();
        return $res;
    }
}
