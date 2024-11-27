<?php
include_once("../classes/review_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_ureviews()
{
    $name = $_SESSION['user_id'];
    $displayreview = new review_class();
    $reviews = $displayreview->get_youreviews($name);
    
    foreach ($reviews as $review)
    {
        $themeid = $review["theme"];
        $theme = $displayreview->get_review_theme($themeid);
        echo 
        "<div class='review-card'>
            <img src='".$review["image"]."' alt='Product image' width='100px' class='review-image'>
            <h4 class='review-title'>".$review["product_name"]."</h4>
            <p class='review-score'>Overall Score:".$review["score"]."</p>
            <p class='review-theme'>".$theme["theme_name"]."</p>
            <p class='review-content'>".$review["comment"]."</p>
        </div>";
    }
}

function display_oreviews()
{
    $name = $_SESSION['user_id'];
    $displayreview = new review_class();
    $reviews = $displayreview->get_othereviews($name);
    
    foreach ($reviews as $review)
    {
        $themeid = $review["theme"];
        $theme = $displayreview->get_review_theme($themeid);
        echo 
        "<div class='review-card'>
            <img src='".$review["image"]."' alt='Product image' width='100px' class='review-image'>
            <h4 class='review-title'>".$review["product_name"]."</h4>
            <p class='review-score'>Overall Score:".$review["score"]."</p>
            <p class='review-theme'>".$theme["theme_name"]."</p>
            <p class='review-content'>".$review["comment"]."</p>
        </div>";
    }
}


?>