<?php
    include_once("../functions/display_profile.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/welcome.css">
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

    <!-- Main section with cards to each functionality -->
    <main>
        <div class="rankinglist_section">
                <div class="top">
                    <p> <?php echo date('j F Y') ?> </p>
                    <span id="trophy" class="material-symbols-outlined">emoji_events</span>
                </div>
                <h2> Ranking List </h2>
                <a href="../view/rankings_view.php">
                    <button>Details</button>
                </a>
        </div>

        <div class="expertreviews_section">
                <div class="top">
                    <p> <?php echo date('j F Y') ?> </p>
                    <span id="rating" class="material-symbols-outlined">reviews</span>
                </div>
                <h2> Expert Ratings </h2> 
                <a href="../viewrankings_view.php">
                    <button>Details</button>
                </a>
        </div>

        <div class="shopperchat_section">
                <div class="top">
                    <p> <?php echo date('j F Y') ?> </p>
                    <span id="bubble" class="material-symbols-outlined">maps_ugc</span>
                </div>
                <h2>Chat with Shoppers</h2>
                <div class="btn"> 
                    <a href="../view/personalshopping.php">
                        <button>Start Chat</button>
                    </a>
                </div>
        </div>
        <div class="curatedlist_section">
                <div class="top">
                    <p> <?php echo date('j F Y') ?> </p>
                    <span id="token" class="material-symbols-outlined">token</span>
                </div>
                <h2>Niche Curated List</h2>
                <div class="btn">
                    <a href="../view/curatedlist_view.php">
                        <button>View List</button>
                    </a>
                </div>
        </div>
    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
</html>