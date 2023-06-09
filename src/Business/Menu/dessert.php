<?php

require_once(dirname(__DIR__) . "/../DataAccess/Menu/dessert.php");

class Afters
{
    public function __construct()
    {
    }

    public function getDesserts()
    {
        $dessertDAL = new Dessert();
        $rs = $dessertDAL->getDesserts();
        $output = '';

        foreach ($rs as $dessert) {
            if (!isset($dessert['name']) || !isset($dessert['description']) || !isset($dessert['allergens']) || !isset($dessert['price'])) {
                // Omitir la entrada si falta algún campo obligatorio
                continue;
            }

            try {
                $imageName = strtolower(str_replace(' ', '', $dessert['name']));
                $imagePath = "../../img/desserts/" . $imageName . ".jpg";

                if (file_exists($imagePath)) {
                    $imageTag = $this->generateImageTag($imagePath, $dessert['name']);
                    $output .= "<div id='objeto'><table><tbody><tr><td rowspan='4' id='cuadrado'>" . $imageTag . "</td><td><h3>" . $dessert['name'] . "</h3></td><tr><td colspan='2'>" . $dessert['description'] . ".</td></tr><tr><td colspan='2'>" . ucfirst($dessert['allergens']) . "</td></tr><tr><td colspan='2' style='text-align:right'>" . $dessert['price'] . " €</td></tr></tbody></table></div>";
                } else {
                    $output .= "<div id='objeto'><table><tbody><tr><td rowspan='4' id='cuadrado'><img src='' alt='Error' style='max-width: 100%; height: auto;'/> <div>Error: Image not found</div></td><td><h3>" . $dessert['name'] . "</h3></td><tr><td colspan='2'>" . $dessert['description'] . ".</td></tr><tr><td colspan='2'>" . ucfirst($dessert['allergens']) . "</td></tr><tr><td colspan='2' style='text-align:right'>" . $dessert['price'] . " €</td></tr></tbody></table></div>";
                }
            } catch (Exception $e) {
                $output .= "<div id='objeto'><table><tbody><tr><td rowspan='4' id='cuadrado'><div>Error: " . $e->getMessage() . "</div></td></tr></tbody></table></div>";
            }
        }

        echo $output;
    }

    private function generateImageTag($imagePath, $altText)
    {
        // Check if the image file exists before generating the image tag
        if (!file_exists($imagePath)) {
            throw new Exception("Image not found for " . $altText);
        }
        $imageTag = "<img src='" . $imagePath . "' alt='" . $altText . "' style='max-width: 100%; height: auto;'/>";

        return $imageTag;
    }
}
