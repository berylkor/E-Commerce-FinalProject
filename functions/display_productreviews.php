<?php
include_once("../classes/review_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_themereviews($id)
{
    $displayreview = new review_class();
    $reviews = $displayreview->get_productreviews($id);
    $rank = 1;
    foreach ($reviews as $review)
    {
        echo 
        "<section class='details'>
            <div class='flexbox'>
                <h2>".$review["product_name"]."</h2>
                <p class='score'>Overall Score:".$review["score"]."/ 5.00</p>
                <div class='purchaselink'> To purchase this item: <a href='". $review["url"] ."'>Click here</a>'</div>
            </div>
            <img src='".$review["image"]."' alt=''>
        </section>
        ";
    
        echo 
        "
            
        ";
        $rank += 1;
    }
}




?>