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
        // $themeid = $review["theme"];
        // $theme = $displayreview->get_review_theme($themeid);
        echo 
        "
                <div class='product_card'>
                    <div class='top'>
                        <h4 class='ranking_no'>".$rank."</h4>
                        <p class='score'>".$review["score"]."/ 5.00</p>
                    </div>
                    <img src='".$review["image"]."' alt='>
                    <p id='item_name'>".$review["product_name"]."</p>
                    <a href='productreviews.php?key=".$review["product_name"]."'>Click for more</a>
                </div>
        ";
        $rank += 1;
    }
}

// <div class='prod_description'>".$review["comment"]."</div>


?>