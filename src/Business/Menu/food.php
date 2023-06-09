<?php

require_once(dirname(__DIR__) . "/../DataAccess/Menu/food.php");

class Meal
{
    public function __construct()
    {
    }

    public function getFoods()
    {
        $foodDAL = new Food();
        $rs = $foodDAL->getFood();
        $type = "";
        $output = '';

        foreach ($rs as $food) {
            if (!isset($food['type']) || !isset($food['name']) || !isset($food['description']) || !isset($food['allergens']) || !isset($food['price'])) {
                // Omitir la entrada si falta algún campo obligatorio
                continue;
            }

            if (!($food['type'] === $type)) {
                $output .= "<h2>" . ucfirst($food['type']) . "</h2>";
                $type = $food['type'];
            }

            try {
                $imageName = strtolower(str_replace(' ', '', $food['name']));
                $imagePath = "../../img/foods/" . $imageName . ".jpg";

                if (file_exists($imagePath)) {
                    $imageTag = $this->generateImageTag($imagePath, $food['name']);
                    $output .= "<div id='objeto'><table><tbody><tr><td rowspan='3' id='cuadrado'>" . $imageTag . "</td><td><h2>" . $food['name'] . "</h2></td><tr><td colspan='2'>" . $food['description'] . ".</td></tr><tr><td colspan='2' style='text-align:right'>" . $food['price'] . " €</td></tr></tbody></table></div>";
                } else {
                    $output .= "<div id='objeto'><table><tbody><tr><td rowspan='3' id='cuadrado'><img src='' alt='Error' style='max-width: 100%; height: auto;'/> <div>Error: Image not found</div></td><td><h2>" . $food['name'] . "</h2></td><tr><td colspan='2'>" . $food['description'] . ".</td></tr><tr><td colspan='2' style='text-align:right'>" . $food['price'] . " €</td></tr></tbody></table></div>";
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
