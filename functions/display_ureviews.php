<?php
include_once("../classes/review_class.php");
include_once("../classes/expert_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_ureviews()
{
    // get user's employee id from the session
    $name = $_SESSION['user_id'];
    // find their reviewer id
    $expert = new expert_class();
    $expertid = $expert->get_expert($name);
    $id = $expertid['reviewer_id'];

    // get their reviews based on their reviewer id
    $displayreview = new review_class();
    $reviews = $displayreview->get_youreviews($id);
    
    // display each of their reviews
    foreach ($reviews as $review)
    {
        $themeid = $review["theme"];
        $theme = $displayreview->get_review_theme($themeid);
        echo 
        "<div class='review-card'>
            <img src='".$review["image"]."' alt='Product image' width='100px' class='review-image'>
            <h4 class='review-title'>".$review["name"]."</h4>
            <p class='review-score'>Overall Score:".$review["score"]."</p>
            <p class='review-theme'>".$theme["theme_name"]."</p>
            <p class='review-content'>".$review["comment"]."</p>
        </div>";
    }
}

function display_oreviews()
{
    // get employee id from the session
    $name = $_SESSION['user_id'];

      // find their reviewer id
      $expert = new expert_class();
      $expertid = $expert->get_expert($name);
      $id = $expertid['reviewer_id'];

    $displayreview = new review_class();
    $reviews = $displayreview->get_othereviews($id);
    
    foreach ($reviews as $review)
    {
        $themeid = $review["theme"];
        $theme = $displayreview->get_review_theme($themeid);
        echo 
        "<div class='review-card'>
            <img src='".$review["image"]."' alt='Product image' width='100px' class='review-image'>
            <h4 class='review-title'>".$review["name"]."</h4>
            <p class='review-score'>Overall Score:".$review["score"]."</p>
            <p class='review-theme'>".$theme["theme_name"]."</p>
            <p class='review-content'>".$review["comment"]."</p>
        </div>";
    }
}


?>