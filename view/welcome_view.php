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
            <a href="about_view.php"><button class="header_btn"> About Us</button></a>
            <a href="welcome_view.php"><button class="header_btn"> Home </button></a>
            <a href="productreviews.html">    <button class="header_btn"> Rankings </button></a>
            <a href="">    <button class="header_btn"> Shopping </button></a>
            <a href="logout.php">
                <button class="header_btn"> Logout </button>
            </a>
        </div>
        <!-- User details -->
        <div class="user_container">
            <span class="material-symbols-outlined">account_circle</span>
            <div class="profile_details">
                <!-- <p>Beryl Koram</p>
                <p>beryl.koram@gmail.com</p> -->
                <?php
                    displayProfile();
                ?>
            </div>
            <a href="profile_view.php" style="text-decoration: none;">
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </a>
        </div>
    </header>

    <!-- Sidebar section -->
    <aside class="menu_container">
        <div class="container">
            <img src="../images/glass.png" alt="" width="120px" height="120px">
            <p>Ad Space</p>
            <a href="#">Learn More</a> 
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
                <h2> Weekly Ranking List </h2>
                <div class="tag">
                    <p>Prada</p>
                    <p>Canon</p>
                    <p>Hilton</p>
                </div>  
                <a href="rankings_view.php">
                    <button>Details</button>
                </a>
        </div>

        <div class="expertreviews_section">
                <div class="top">
                    <p> <?php echo date('j F Y') ?> </p>
                    <span id="rating" class="material-symbols-outlined">reviews</span>
                </div>
                <h2> Expert Ratings </h2>
                <div class="tag">
                    <p>Content Creator</p>
                    <p>Entrepreneur</p>
                    <p>Restaurateur</p>
                </div>  
                <a href="rankings_view.php">
                    <button>Details</button>
                </a>
        </div>

        <div class="shopperchat_section">
                <div class="top">
                    <p> <?php echo date('j F Y') ?> </p>
                    <span id="bubble" class="material-symbols-outlined">maps_ugc</span>
                </div>
                <h2>Chat with Shoppers</h2>
                <div class="tag">
                    <p>Hotels</p>
                    <p>Restaurants</p>
                    <p>Clothes</p>
                </div>
                <div class="btn"> 
                    <button>Start Chat</button>
                    <button>Place Order</button>
                </div>
        </div>
        <div class="curatedlist_section">
                <div class="top">
                    <p> <?php echo date('j F Y') ?> </p>
                    <span id="token" class="material-symbols-outlined">token</span>
                </div>
                <h2>Niche Curated List</h2>
                <div class="tag">
                    <p>Hotels</p>
                    <p>Restaurants</p>
                    <p>Clothes</p>
                </div>
                <div class="btn">
                    <button>View List</button>
                    <button>Place Order</button>
                </div>
        </div>
    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
</html>