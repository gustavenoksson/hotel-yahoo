<?php

require("./hotelFunctions.php");
require("./bookFunctions.php");
require "./vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$roomNumber = $_POST['room'];
$arrivalDate = $_POST['arrival'];
$departureDate = $_POST['departure'];
$transferCode = htmlspecialchars($_POST['transfercode'], ENT_QUOTES);

$message = "";
$totalCost = 0;
$totalFeature = 0;
$roomCost = $roomNumber + 3;
$roomTotal = 0;

echo "name: $name <br>";
echo "room number: $roomNumber <br>";
echo "room cost: $roomCost <br>";

echo var_dump($arrivalDate);
echo "<br>";
var_dump($departureDate);
echo "<br>";

$numberOfNights = floor(strtotime($departureDate) / 86400) - floor(strtotime($arrivalDate) / 86400);
echo "number of nights: $numberOfNights<br>";


if (isset($_POST['features'])) {
          $features = $_POST['features'];

          foreach ($features as $feature) {
                    echo "feature cost: $feature <br>";
                    $totalFeature = $totalFeature + $feature;
          }
}
echo "feature total: $totalFeature <br>";
if ($totalFeature == 6) {
          $totalFeature--;
}
echo "feature total with discount: $totalFeature <br>";

echo "transfercode: $transferCode <br>";
// var_dump($transferCode);
// echo "<br>";

$roomTotal = $roomCost * $numberOfNights;
echo "total room cost: $roomTotal <br>";
$totalCost = $roomTotal + $totalFeature;
echo "total cost: $totalCost <br>";
echo "booking in progress...<br>";

// check database
$hotelDb = connect('hotel.db');

$roomAvailable = checkRoomAvailability($hotelDb, $roomNumber, $arrivalDate, $departureDate);

// check transfercode
$validUUID = isValidUuid($transferCode);
$transferCheck = transferCodeCheck($transferCode, $totalCost);

// echo "room check database: ";
// var_dump($roomAvailable);
// echo "<br>";

echo "transfercheck valid format: ";
var_dump($validUUID);
echo "<br>";

echo "transfercheck total cost: ";
var_dump($transferCheck);
echo "<br>";
// transferCodeDeposit($transferCode, 'Jonas');

if (count($roomAvailable) === 0) {
          if ($validUUID && $transferCheck) {

                    transferCodeDeposit($transferCode, 'Jonas');

                    $insertQuery =
                              'INSERT INTO bookings (room_id, arrival_date, departure_date, transfer_code, cost)
                  VALUES (:roomtype, :arrivalDate, :departureDate, :transferCode, :cost)';
                    $statement = $hotelDb->prepare($insertQuery);
                    $statement->bindParam(':roomtype', $roomNumber, PDO::PARAM_INT);
                    $statement->bindParam(':arrivalDate', $arrivalDate, PDO::PARAM_STR);
                    $statement->bindParam(':departureDate', $departureDate, PDO::PARAM_STR);
                    $statement->bindParam(':transferCode', $transferCode, PDO::PARAM_STR);
                    $statement->bindParam(':cost', $totalCost, PDO::PARAM_INT);
                    $statement->execute();

                    $message = "->Congrats $name, successful booking<-";

                    $jsonResponse = [
                              "island" => "Gooh-Gooh Island",
                              "hotel" => "Hotel Yahoo",
                              "arrival_date" => "$arrivalDate",
                              "departure_date" => "$departureDate",
                              "total_cost" => "$totalCost",
                              "stars" => "3",
                              "addtional_info" => "Welcome to Yahoo!"
                    ];
                    $bookingResponse = json_encode($jsonResponse);
          } else {
                    if (!$validUUID) {
                              echo "Invalid transfercode!<br>";
                    }
                    if (!$transferCheck) {
                              echo "Low cash balance transfercode!";
                    }
          }
} else {
          echo "Room is already booked!";
}



require __DIR__ . '/header.php';

?>

<main>
          <img width="300" height="300" alt="booked" src="images/booked.jpeg">
</main>
<?php
echo "$message</br>";
echo "json kvitto: $bookingResponse";
require __DIR__ . '/slogan.php';
?>
