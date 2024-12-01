<?php
include_once("../classes/shopper_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function displayShoppername($id)
{
    $displayshopper = new shopper_class();
    $shoppername = $displayshopper->get_shopper($id);             
    echo "<h3>Chat with Personal Shopper: ".$shoppername['name']."</h3>";
}


?>