<?php
    include_once("../functions/display_profile.php");
    include_once("../functions/display_productreviews.php");
    
    if (isset($_GET['key'])) 
    {
        // get review id from form
        $id = $_GET["key"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>
    <link rel="stylesheet" href="../css/reviews.css">
    <link rel="stylesheet" href="../css/inner_footer.css">
    <link rel="stylesheet" href="../css/inner_header.css">
    <link rel="shortcut icon" href="../images/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <!-- Page Header -->
    <header>
        <!-- Company name -->
        <h2 id="nichelogo">NicheNest</h2>
        <!-- Buttons to other pages -->
        <div class="btn_container">
        <a href="../view/about_view.php"><button class="header_btn"> About Us</button></a>
            <a href="../view/welcome_view.php"><button class="header_btn"> Home </button></a>
            <a href="../view/productreviews.php"> <button class="header_btn"> Rankings </button></a>
            <a href="../view/personalshopping.php"> <button class="header_btn"> Shopping </button></a>
            <a href="../view/logout.php">
                <button class="header_btn"> Logout </button>
            </a>
        </div>
        <!-- User details -->
        <div class="user_container">
            <span class="material-symbols-outlined">account_circle</span>
            <div class="profile_details">
                <p>Beryl Koram</p>
                <p>beryl.koram@gmail.com</p>
            </div>
            <a href="profile_view.php" style="text-decoration: none;">
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </a>
        </div>
    </header>

    <!-- Sidebar section -->
    <aside class="menu_container">
        <div class="container">
            <img src="../images/candle ad.jpeg" alt="ads image" width="120px" height="120px">
            <a href="../view/candle.html" target="_blank" rel="noopener noreferrer">Ad Space</a> 
        </div>
        <hr>
        
    </aside>

    <main>
        <!-- <section class="details">
            <div class="flexbox">
                <h2>Camera Kit</h2>
                <p class="score">Overall Score: 4.67 / 5.00</p>
                <div class="purchaselink"> To purchase this item: <a href="">Click here</a></div>
            </div>
            <img src="../images/camera.jpg" alt="">
        </section>

        <h3>Individual Review and Scores</h3>
        <section class="individualreviews">

            <div class="comment_container">
                <div class="comment_header">
                    <div class="commentuser_container">
                        <div class="image_container">
                            <img src="../images/profile.jpeg" alt="user" width="30px">
                        </div>
                        <div class="user_details">
                            <h6>Thomas Brett</h6>
                            <p>20 days ago</p>
                        </div>
                    </div>
    
                    <div class="review_score_container">
                        <h6>Review Score: <p>4/5</p> </h6>
                    </div>
                </div>

                <div class="comment_content">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ut repellendus doloremque amet aliquid, 
                         facere recusandae officiis maxime accusamus, a, sed numquam optio fugiat vero. Tempora maxime ducimus tempore, 
                        officiis exercitationem optio, architecto sit, iure harum consectetur nesciunt ad animi expedita esse ipsa et magnam 
                        asperiores illum praesentium consequatur incidunt? Nihil rem nam tenetur ab.
                    </p>
                </div>
            </div>

        </section> -->
        <?php
            display_individualreviews($id)
        ?>
    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>

</html>