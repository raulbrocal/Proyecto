<?php

require_once(dirname(__DIR__) . "/../Model/Menu/drink.php");

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
            echo "<div id='objeto'><table><tbody><tr><td rowspan='3' id='cuadrado'><img src='../../img/drinks/agua.png' style='max-width: 100%; height: auto;'/></td><td><h2>" . $drink['name'] . "</h2></td><tr><td colspan='2'>" . $drink['name'] . " " . $drink['ml'] . "ml</td></tr><tr><td colspan='2' style='text-align:right'>" . $drink['price'] . " €</td></tr></tbody></table></div>";
        }
    }
}
