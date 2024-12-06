<?php
    include_once("../settings/core.php");
    check_login();
    include_once("../functions/display_customerdetails.php");
    include_once("../functions/display_profile.php");
    include_once("../functions/display_privileges.php");
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
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
                
                    <?php
                        displayProfile();
                    ?>
                
                <a href="../view/profile_view.php" style="text-decoration: none;">
                    <span class="material-symbols-outlined">keyboard_arrow_down</span>
                </a>
            </div>

    </header>

    <!-- Sidebar section -->
    <aside class="menu_container">
        <div class="container">
            <img src="../images/candle ad.jpeg" alt="ads image" width="120px" height="120px">
            <a href="../view/candle.html" target="_blank" rel="noopener noreferrer">Learn More</a> 
        </div>
        <hr>
    </aside>

    <main>
        <!-- Display the customer's details and allow them to make changes -->
            <?php
                displayCustomerdetails();
            ?>

        <div class="other_container">           
            
            <!-- privilege level table -->
            <div class="shopperlevel_container">
                <h3 id="tier_level">Customer Tier Level</h3>
                <form action="../view/subscription_view.php" method="post" name="levelform" id="levelform">  
                    <?php
                        display_privileges();
                    ?>
                    <button type="submit">Confirm</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
<script src="../js/profile.js"></script>
</html>