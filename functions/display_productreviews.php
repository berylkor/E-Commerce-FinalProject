<?php
include_once("../classes/review_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_individualreviews($id)
{
    $displayreview = new review_class();
    $reviews = $displayreview->get_productreviews($id);
    echo "<section class='details'>
            <div class='flexbox'>
                <h2>".$reviews[0]['name']."</h2>
                <p class='score'>Overall Score: ".$reviews[0]['avg_score']." / 5.00</p>
                <div class='purchaselink'> To purchase this item: <a href='".$reviews[0]['url']."'>Click here</a></div>
            </div>
            <img src='".$reviews[0]['image']."' alt='product image'>
        </section>
        <h3>Individual Review and Scores</h3>
        <section class='individualreviews'>";
    foreach ($reviews as $review)
    {
        $today = new DateTime();
        $dayspast = new DateTime($review['created_at']);
        $timeinbetween = $today->diff($dayspast);
        $daysbetween = $timeinbetween->days;
        echo 
        "<div class='comment_container'>
                <div class='comment_header'>
                    <div class='commentuser_container'>
                        <div class='image_container'>";
        if (!empty($review['reviewer_image']))
        {
                echo "<img src='".$review['reviewer_image']."' alt='Expert Profile' width='30px'>";                   
        }
        else
        {
            echo "<span class='material-symbols-outlined' style='font-size: 30px; color: #333;'>account_circle</span>";
        }
        echo
                    "</div>
                        <div class='user_details'>
                            <h6>".$review['reviewer_name']."</h6>
                            <p>".$daysbetween." days ago</p>
                        </div>
                    </div>
    
                    <div class='review_score_container'>
                        <h6>Review Score: <p>".$review['score']."/5.00</p> </h6>
                    </div>
                </div>

                <div class='comment_content'>
                    <p>
                        ".$review['comment']."
                    </p>
                </div>
            </div>";
    }
    echo "</section>";
}




?>