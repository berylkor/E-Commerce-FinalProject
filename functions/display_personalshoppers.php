<?php
include_once("../classes/shopper_class.php");
include_once("../classes/assign_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_personalshoppers()
{
    $displayshoppers = new shopper_class();
    $shoppers = $displayshoppers->get_shoppers();

    foreach ($shoppers as $shopper)
    {
        echo 

        "<tr>
            <td>".$shopper['shopper_id']."</td>
            <td>".$shopper['name']."</td>
         </tr>";
    }
}

function display_assignments()
{
    $displayassignments = new assign_class();
    $assignments = $displayassignments->get_assignments();

    foreach ($assignments as $assignment)
    {
        echo 

        "<tr>
            <td>".$assignment['customer_name']."</td>
            <td>".$assignment['shopper_name']."</td>
         </tr>";
    }
}


?>