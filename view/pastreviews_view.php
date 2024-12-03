<?php
    include_once("../functions/display_employeeprofile.php");
    include_once("../functions/display_ureviews.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner Reviews</title>
    <link rel="stylesheet" href="../css/pastreview.css">
    <link rel="stylesheet" href="../css/inner_footer.css">
    <link rel="stylesheet" href="../css/inner_header.css">
    <link rel="shortcut icon" href="../images/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
    <!-- Page Header -->
    <header>
        <h2 id="nichelogo">NicheNest</h2>
        <div class="btn_container">
        <a href="../view/about_view.php"><button class="header_btn"> About Us</button></a>
            <a href="../view/dashboard_view.php"><button class="header_btn"> Home </button></a>
            <a href="../view/logout.php">
                <button class="header_btn"> Logout </button>
            </a>
        </div>
        <div class="user_container">
                <?php
                    displayEmployeeProfile();
                ?>
            <a href="../view/employee_profile_view.php" style="text-decoration: none;">
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </a>
        </div>
    </header>

    <!-- Ad Space -->
    <aside class="menu_container">
        <div class="container">
            <img src="../images/candle ad.jpeg" alt="ads image" width="120px" height="120px">
            <a href="../view/candle.html" target="_blank" rel="noopener noreferrer">Learn More</a> 
        </div>
        <hr>
        <ul>
                <li> 
                    <a href="../view/partnereviews_view.php"> <span class="material-symbols-outlined">rate_review</span> New Review </a> 
                </li>
                <li>
                    <a href="../view/pastreviews_view.php"> <span class="material-symbols-outlined">history</span> Past Reviews </a> 
                </li>
                <li>
                    <a href="../view/conversations_view.php"> <span class="material-symbols-outlined">chat</span> Conversations </a> 
                </li>
        </ul>
    </aside>

    <!-- Page main -->
    <main>

        <section class="user-reviews">
            <h3>Products You Reviewed</h3>
            <div class="review-grid">
                <?php
                    display_ureviews();
                ?>
            </div>
        </section>

        <section class="other-reviews">
            <h3>Products Reviewed by Other Users</h3>
            <div class="review-grid">
                <?php
                    display_oreviews();
                ?>
            </div>
        </section>


    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
</html>