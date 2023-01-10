<?php

require("./hotelFunctions.php");
require "./vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$roomNumber = $_POST['room'];
$roomIndex = $_POST['roomI'];
$arrivalDate = $_POST['arrival'];
$departureDate = $_POST['departure'];
$transferCode = htmlspecialchars($_POST['transfercode'], ENT_QUOTES);

$totalCost = 0;
$roomCost = $roomNumber + 3;

echo "name: $name <br>";

echo var_dump($roomNumber);
echo "<br>";
echo "room cost: $roomCost <br>";
echo "roomIndex: $roomIndex <br>";


echo var_dump($arrivalDate);
echo "<br>";
var_dump($departureDate);
echo "<br>";

if (isset($_POST['features'])) {
          $features = $_POST['features'];

          foreach ($features as $feature) {
                    var_dump($feature);
                    echo "<br>";

                    $totalCost = $totalCost + $feature;
          }
}


var_dump($transferCode);
echo "<br>";

$totalCost = $totalCost + $roomCost;
echo "total cost: $totalCost <br>";


echo "booking in progress";
require __DIR__ . '/header.php';
?>

<main>
          <img width="300" height="300" alt="booked" src="images/booked.jpeg">
</main>
<?php
require __DIR__ . '/slogan.php';
?>
