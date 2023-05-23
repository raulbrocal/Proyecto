<?php

require_once(dirname(__DIR__) . "/../Model/Menu/starter.php");

class Appetizer
{
    function __construct()
    {
    }

    function getStarters()
    {
        $startersDAL = new Starter();
        $rs = $startersDAL->getStarters();
        $output = '';

        foreach ($rs as $starter) {
            if (!isset($starter['name']) || !isset($starter['description']) || !isset($starter['allergens']) || !isset($starter['price'])) {
                // Skip the starter if any required field is missing
                continue;
            }

            try {
                $imageName = strtolower(str_replace(' ', '', $starter['name']));
                $imagePath = "../../img/starters/" . $imageName . ".jpg";

                if (file_exists($imagePath)) {
                    $imageTag = $this->generateImageTag($imagePath, $starter['name']);
                    $output .= "<div id='objeto'><table><tbody><tr><td rowspan='4' id='cuadrado'>" . $imageTag . "</td><td><h3>" . $starter['name'] . "</h3></td><tr><td colspan='2'>" . $starter['description'] . "</td></tr><tr><td colspan='2'>" . ucfirst($starter['allergens']) . "</td></tr><tr><td colspan='2' style='text-align:right'>" . $starter['price'] . " €</td></tr></tbody></table></div>";
                } else {
                    $output .= "<div id='objeto'><table><tbody><tr><td rowspan='4' id='cuadrado'><img src='' alt='Error' style='max-width: 100%; height: auto;'/> <div>Error: Image not found</div></td><td><h3>" . $starter['name'] . "</h3></td><tr><td colspan='2'>" . $starter['description'] . "</td></tr><tr><td colspan='2'>" . ucfirst($starter['allergens']) . "</td></tr><tr><td colspan='2' style='text-align:right'>" . $starter['price'] . " €</td></tr></tbody></table></div>";
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
