<?php

require_once(dirname(__DIR__) . "/connection.php");

class Dessert
{
    function connection()
    {
        try {
            return mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        } catch (Exception $e) {
            return ("Could not connect to database:" . $e->getMessage());
        }
    }
    function getDesserts()
    {
        $conn = $this->connection();
        $stmt = "SELECT name, description, allergens, price FROM dessert ORDER BY name;";
        $res = $conn->query($stmt);
        $desserts = array();
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $desserts[] = $row;
            }
        }
        $conn->close();
        return $res;
    }
}
