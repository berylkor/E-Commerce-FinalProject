<?php
    include_once("../settings/core.php");
    check_login();
    include_once("../functions/display_profile.php");
    include_once("../functions/display_themereviews.php");
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Rankings</title>
    <link rel="stylesheet" href="../css/ranking.css">
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

    <!-- Ad space -->
    <aside class="menu_container">
        <div class="container">
            <img src="../images/candle ad.jpeg" alt="ads image" width="120px" height="120px">
            <a href="../view/candle.html" target="_blank" rel="noopener noreferrer">Learn More</a> 
        </div>
        <hr>
        <div class="menu_content">
            <div class="menu_header">
                <h4>Themes</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <!-- Product Filtering within the provided categories -->
            <ul>
                <li> 
                    <input type="radio" name="theme" id="media_filter" value="media_container">
                    <p> <span class="material-symbols-outlined">movie</span> Media </p> 
                </li>
                <li>
                    <input type="radio" name="theme" id="ent_filter" value="ent_container">
                    <p> <span class="material-symbols-outlined">celebration</span> Entertainment </p> 
                </li>
                <li>
                    <input type="radio" name="theme" id="artifact_filter" value="artif_container">
                    <p><span class="material-symbols-outlined">storefront</span> Artifacts </p> 
                </li>
                <li>
                    <input type="radio" name="theme" id="food_filter" value="food_container">
                    <p><span class="material-symbols-outlined">local_dining</span> Food Experiences </p> 
                </li>
                <li>
                    <input type="radio" name="theme" id="all_filter" value="all">
                    <p><span class="material-symbols-outlined">view_list</span> All </p> 
                </li>
            </ul>
        </div>
    </aside>
    
    <!-- Main section -->
    <main>
        <!-- Product listings under media -->
        <section id="media_container" class="list_container">
            <h2> Media </h2>
            <div class="grid_container">
                <?php
                    display_themereviews(1)
                ?>
            </div>
        </section>

        <section id="ent_container" class="list_container">
            <h2> Entertainment </h2>
            <div class="grid_container">
                <?php
                    display_themereviews(2)
                ?>
            </div>
        </section>

        <section id="artif_container" class="list_container">
            <h2> Artifacts </h2>
            <div class="grid_container">
                <?php
                    display_themereviews(3)
                ?>
            </div>
        </section>

        <section id="food_container" class="list_container">
            <h2> Food Experiences</h2>
            <div class="grid_container">
                <?php
                    display_themereviews(4)
                ?>
            </div>
        </section>

    </main>
    
    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
<script src="../js/review.js"></script>
</html>