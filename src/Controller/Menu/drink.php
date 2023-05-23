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
        $output = '';

        foreach ($rs as $drink) {
            if (!isset($drink['type']) || !isset($drink['name']) || !isset($drink['ml']) || !isset($drink['price'])) {
                // Skip the drink if any required field is missing
                continue;
            }

            if (!($drink['type'] === $type)) {
                $output .= "<h2>" . $drink['type'] . "</h2>";
                $type = $drink['type'];
            }

            try {
                $imageName = strtolower(str_replace(' ', '', $drink['name']));
                $imagePath = "../../img/drinks/" . $imageName . ".png";

                if (file_exists($imagePath)) {
                    $imageTag = $this->generateImageTag($imagePath, $drink['name']);
                    $output .= "<div id='objeto'><table><tbody><tr><td rowspan='3' id='cuadrado'>" . $imageTag . "</td><td><h2>" . $drink['name'] . "</h2></td><tr><td colspan='2'>" . $drink['name'] . " " . $drink['ml'] . "ml</td></tr><tr><td colspan='2' style='text-align:right'>" . $drink['price'] . " €</td></tr></tbody></table></div>";
                } else {
                    $output .= "<div id='objeto'><table><tbody><tr><td rowspan='3' id='cuadrado'><img src='' alt='Error' style='max-width: 100%; height: auto;'/> <div>Error: Image not found</div></td><td><h2>" . $drink['name'] . "</h2></td><tr><td colspan='2'>" . $drink['name'] . " " . $drink['ml'] . "ml</td></tr><tr><td colspan='2' style='text-align:right'>" . $drink['price'] . " €</td></tr></tbody></table></div>";
                }
            } catch (Exception $e) {
                $output .= "<div>Error: " . $e->getMessage() . "</div>";
            }
        }

        echo $output;
    }

    private function generateImageTag($imagePath, $altText)
    {
        $imageTag = "<img src='" . $imagePath . "' alt='" . $altText . "' style='max-width: 100%; height: auto;'/>";

        return $imageTag;
    }
}
