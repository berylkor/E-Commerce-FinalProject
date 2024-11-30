<?php
include_once("../classes/shopper_class.php");

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
            <td></td>
         </tr>";
    }
}


?>