<?php
include_once("../classes/shopper_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_matchform()
{
    $displayshoppers = new shopper_class();
    $shoppers = $displayshoppers->get_shoppers();
    $clients = $displayshoppers-> get_shopper_clients();
    echo "<form action='../actions/assign_shopper_action.php' method='post' name='assign form' class='inputform'>
                <label for='shopper'>Personal Shopper</label>
                <select name='shopper' id='shopper' required>
                    <option value='0' disabled selected>Select a Shopper</option>";
    foreach ($shoppers as $shopper)
    {    
        echo "<option value='".$shopper['shopper_id']."'>".$shopper['name']."</option>";
    }
    echo "</select>
          <label for='customer'>Customer</label>
                <select name='customer' id='customer' required>
                    <option value='0' disabled selected>Select a Customer</option>";
    foreach ($clients as $client)
    {
        echo "<option value='".$client['user_id']."'>".$client['name']."</option>";

    }
    echo "</select>
          <button type='submit'>Match</button>
          </form>";
}


?>