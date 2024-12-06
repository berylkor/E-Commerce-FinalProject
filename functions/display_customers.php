<?php
include_once("../classes/user_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_customers()
{
    $displaycustomers = new user_class();
    $customers = $displaycustomers->get_customers();

    foreach ($customers as $customer)
    {
        echo 

        "<tr>
            <td>".$customer['user_id']."</td>
            <td>".$customer['name']."</td>
         </tr>";
    }
}


?>