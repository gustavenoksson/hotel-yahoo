<?php

require("./hotelFunctions.php");
require "./vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$roomNumber = $_POST['room'];
$arrivalDate = $_POST['arrival'];
$departureDate = $_POST['departure'];
$transfercode = htmlspecialchars($_POST['transfercode'], ENT_QUOTES);

$totalCost = 0;
$featureCost = 0;


echo "name: $name <br>";

echo var_dump($roomNumber);
echo "<br>";
echo var_dump($arrivalDate);
echo "<br>";
var_dump($departureDate);
echo "<br>";

if (isset($_POST['features'])) {
          $features = $_POST['features'];

          foreach ($features as $feature) {
                    var_dump($feature);
                    echo "<br>";

                    $featureCost = 1;

                    $totalCost = $totalCost + $featureCost;
          }
}

var_dump($transfercode);
echo "<br>";

echo "total cost: $totalCost <br>";


echo "booking in progress";
