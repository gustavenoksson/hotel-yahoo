<?php

require __DIR__ . "/header.php";
require __DIR__ . "/hotelFunctions.php";

$file = file_get_contents(__DIR__ . "/logbook.json");
$vacation = json_decode($file, true);
$totalCost = 0;

function getRevenue()
{

    $db = connect("hotel.db");

    $statement = $db->prepare("SELECT cost FROM bookings");
    $statement->execute();
    $costs = $statement->fetchAll();

    $totalRevenue = 0;

    foreach ($costs as $cost) {
        foreach ($cost as $revenue) {
            $totalRevenue += $revenue;
        }
    }
    echo "Total amount of revenue: " . $totalRevenue;
};

?>
<section class="vacationSection">
    <?php
    foreach ($vacation as $key => $hotelBookings) :
        foreach ($hotelBookings as $hotelBooking) :

            // Calculates the total costs of all bookings
            $totalCost += (int) $hotelBooking["total_cost"];
    ?>
            <article class="vacationCard">
                <p class="headline">Booking</p>
                <p>Island: <?= $hotelBooking["island"] ?></p>
                <p>Hotel: <?= $hotelBooking["hotel"] ?></p>
                <p>Arrival Date: <?= $hotelBooking["arrival_date"] ?></p>
                <p>Departure Date: <?= $hotelBooking["departure_date"] ?></p>
                <p>Total Cost: <?= $hotelBooking["total_cost"] ?>$</p>
            </article>
    <?php
        endforeach;
    endforeach;
    ?>
    <article class="vacationFactBox">
        <div>
            <p class="headline">Booking Cost</p>
            <p>Total amount spent on vacation: <?= $totalCost ?>$</p>
        </div>
        <div>
            <p class="headline">Hotel Revenue</p>
            <p> <?php getRevenue() ?>$ </p>
        </div>
    </article>
</section>

<?php

require __DIR__ . '/slogan.php';
