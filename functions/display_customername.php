<?php
    include_once("../classes/user_class.php");
    include_once("../classes/shopper_class.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    function displayCustomername($id)
    {
        $displaycustomer = new user_class();
        $customername = $displaycustomer->get_customer($id);             
        echo "<h3>Chat with Customer: ".$customername['name']."</h3>";
    }

?>