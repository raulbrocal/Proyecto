<?php

require_once(dirname(__DIR__) . "/../Model/Menu/starters.php");

class Appetizers
{
    function __construct()
    {
    }

    function getStarters()
    {
        $startersDAL = new Starters();
        $rs = $startersDAL->getStarters();
        foreach ($rs as $starter) {
            echo "<div id='objeto'><table><tbody><tr><td rowspan='4' id='cuadrado'><img src='../../img/starters/" . lcfirst(str_replace(' ', '', $starter['name'])) . ".jpg' style='max-width: 100%; height: auto;'/></td><td><h3>" . $starter['name'] . "</h3></td><tr><td colspan='2'>" . $starter['description'] . "</td></tr><tr><td colspan='2'>" . ucfirst($starter['allergens']) . "</td></tr><tr><td colspan='2' style='text-align:right'>" . $starter['price'] . " €</td></tr></tbody></table></div>";
        }
    }
}
