<?php
include_once("../classes/item_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_custom_items($id)
{
    // instantiate a new items class
    $displayitem = new items_class();
    // get the details of the items that have been curated for the user
    $items = $displayitem->get_custom_items($id);

    foreach ($items as $item)
    {
        echo 
        // display each producct and allow the user to add it to their cart
        "<div class='item-card'>
            <img src='".$item["item_img"]."' alt='item image' class='item-image'>
            <div class='item-details'>
                <h3>".$item["item_name"]."</h3>
                <p class='price'>".number_format($item["Price"], 2)."</p>
            </div>
            <div class='item-actions'>
                <form action='../actions/add_cart_action.php' method='post'>
                    <input type='hidden' name='itemid' id='itemid' value='".$item["item_id"]."'>
                    <button type='submit'class='button book'>Add to Cart</button>
                </form>
            </div>
        </div>";
    }
}

function display_shopper_items($id)
{
    // instantiate a new items class
    $displayitem = new items_class();
    // get the details of the items that have been curated for the user
    $items = $displayitem->get_shopper_items($id);

    foreach ($items as $item)
    {
        echo 
        // display each producct and allow the user to add it to their cart
        "<div class='item-card'>
            <img src='".$item["item_img"]."' alt='item image' class='item-image'>
            <div class='item-details'>
                <h3>".$item["item_name"]."</h3>
                <p class='price'>".number_format($item["Price"], 2)."</p>
            </div>
            <div class='item-actions'>
                <form action='../actions/add_cart_action.php' method='post'>
                    <input type='hidden' name='itemid' id='itemid' value='".$item["item_id"]."'>
                </form>
            </div>
        </div>";
    }
}


?>