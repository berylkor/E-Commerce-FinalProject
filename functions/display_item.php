<?php
include_once("../classes/item_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_custom_items($id)
{
    $displayitem = new items_class();
    $items = $displayitem->get_custom_items($id);

    foreach ($items as $item)
    {
        // $themeid = $review["theme"];
        // $theme = $displayreview->get_review_theme($themeid);
        echo 

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
                    <button class='button delete'><span class='material-symbols-outlined'>delete</span></button>
                </form>
            </div>
        </div>";
    }
}

// <div class='prod_description'>".$review["comment"]."</div>


?>