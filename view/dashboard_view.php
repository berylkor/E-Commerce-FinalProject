<?php
    include_once("../functions/display_profile.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expert & Personal Shopper Dashboard</title>
    <link rel="stylesheet" href="../css/partner1.css">
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
            <a href="about.html"><button class="header_btn"> About Us</button></a>
            <a href="dashboard.html"><button class="header_btn"> Home </button></a>
        </div>
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

    <!-- Ad Space -->
    <aside class="menu_container">
        <div class="container">
            <img src="../images/image.png" alt="" width="120px" height="120px">
            <p>Ad Space</p>
            <a href="#">Learn More</a> 
        </div>
        <hr>
        <div class="menu_content">
            <div class="menu_header">
                <h4>Menu</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <ul>
                <li> 
                    <a href="partnereviews_view.php"> <span class="material-symbols-outlined">flight</span> New Review </a> 
                </li>
                <li>
                    <a href="pastreviews_view.php"> <span class="material-symbols-outlined">nightlife</span> Past Reviews </a> 
                </li>
                <li>
                    <a href="personal_dashboard.html"> <span class="material-symbols-outlined">cardiology</span> Personal </a> 
                </li>
                <li>
                    <a href="personal_dashboard.html"> <span class="material-symbols-outlined">cardiology</span> Conversations </a> 
                </li>
                <li id="logout"> <a href="logout.php"> <span class="material-symbols-outlined">logout</span> Logout </a> </li>
            </ul>
        </div>
    </aside>

    <main>
        <section class="intro">
            <h1>Welcome to NicheNest</h1>
            <p>Your go-to platform for niche product reviews and personalized shopping assistance.</p>
        </section>

        <section class="roles">
            <div class="role expert">
                <h2>For Experts</h2>
                <p>
                    Share your expertise by reviewing niche products. Help users make informed decisions with your valuable insights.
                </p>
                <a href="partnereviews_view.php" class="cta_btn">Start a Review</a>
            </div>
            <div class="role shopper">
                <h2>For Personal Shoppers</h2>
                <p>
                    Connect users with hard-to-find items tailored to their needs. Use your skills to locate unique products.
                </p>
                <a href="personal_dashboard.html" class="cta_btn">Get Started</a>
            </div>
        </section>

        <section class="features">
            <h2>Key Features</h2>
            <ul>
                <li><strong>Comprehensive Reviews:</strong> Explore and create detailed reviews for niche products.</li>
                <li><strong>Shopping Assistance:</strong> Help users locate rare or unique items.</li>
                <!-- <li><strong>Personalized Dashboard:</strong> Manage your activity and track user requests with ease.</li> -->
            </ul>
        </section>
    </main>
    
    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
</html>
