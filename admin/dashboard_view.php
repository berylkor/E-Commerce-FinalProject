<?php
include_once("../functions/display_profile.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
    <link rel="stylesheet" href="../css/inner_footer.css">
    <link rel="stylesheet" href="../css/inner_header.css">
    <link rel="shortcut icon" href="../images/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
<header>
        <!-- Company name -->
        <h2 id="nichelogo">NicheNest</h2>
        <!-- Buttons to other pages -->
        <div class="btn_container">
            <a href="../view/about_view.php"><button class="header_btn"> About Us</button></a>
            <a href="../admin/dashboard_view.php"><button class="header_btn"> Home </button></a>
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

    <aside class="menu_container">
        <div class="container">
            <img src="../images/candle ad.jpeg" alt="ads image" width="120px" height="120px">
            <a href="../view/candle.html" target="_blank" rel="noopener noreferrer">Learn More</a> 
        </div>
        <hr>
        <div class="menu_content">
            <div class="menu_header">
                <h4>Menu</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <ul>
                <li> 
                    <a href="../admin/shopping_management.php"> <span class="material-symbols-outlined">flight</span> Personal Shopping </a> 
                </li>
                <li>
                    <a href="../admin/"> <span class="material-symbols-outlined">nightlife</span> Expert Reviews </a> 
                </li>
            </ul>
        </div>
    </aside>
</body>
</html>