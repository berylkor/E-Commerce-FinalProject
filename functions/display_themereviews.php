<?php
include_once("../classes/review_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_themereviews($id)
{
    $displayreview = new review_class();
    $reviews = $displayreview->get_themereviews($id);
    $rank = 1;
    foreach ($reviews as $review)
    {
        echo 
        "
                <div class='product_card'>
                    <div class='top'>
                        <h4 class='ranking_no'>".$rank."</h4>
                        <p class='score'>".number_format($review["score"],2)."/ 5.00</p>
                    </div>
                    <img src='".$review["image"]."' alt='>
                    <p id='item_name'>".$review["name"]."</p>
                    <a href='productreviews.php?key=".$review["product_id"]."'>Click for more</a>
                </div>
        ";
        $rank += 1;
    }
}


?>