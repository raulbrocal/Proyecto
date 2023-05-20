<?php

require_once("../Model/drink.php");

class Beverage
{
    function __construct()
    {
    }

    function getDrinks()
    {
        $drinkDAL = new Drink();
        $rs = $drinkDAL->getDrinks();
        $type = "";
        foreach ($rs as $drink) {
            if (!($drink['type'] === $type)) {
                echo "<h2>" . $drink['type'] . "</h2>";
                $type = $drink['type'];
            }
            echo "<div id='objeto'><table><tbody><tr><td rowspan='3' id='cuadrado'></td><td><h2>" . $drink['name'] . "</h2></td><tr><td colspan='2'>" . $drink['name'] . " " . $drink['ml'] . "ml</td></tr><tr><td colspan='2'>" . $drink['price'] . " €</td></tr></tbody></table></div>";
        }
    }
}
