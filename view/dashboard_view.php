<?php
    include_once("../settings/core.php");
    check_login(); // check that the user is logged in
    include_once("../functions/display_employeeprofile.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // store the role id 
    $role = $_SESSION['role_id'];
    if ($role == 1)
    {
        // redirect users if they are not meant to be
        header("../view/welcome_view.php");
    } 
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
            <a href="../view/about_view.php"><button class="header_btn"> About Us</button></a>
            <a href="../view/dashboard_view.php"><button class="header_btn"> Home </button></a>
            <a href="../view/logout.php">
            <a href="../view/about_view.php"><button class="header_btn"> About Us</button></a>
            <a href="../view/dashboard_view.php"><button class="header_btn"> Home </button></a>
            <a href="../view/logout.php">
                <button class="header_btn"> Logout </button>
            </a>
        </div>
        <div class="user_container">
                <?php
                    displayEmployeeProfile();
                    displayEmployeeProfile();
                ?>
            <a href="../view/employee_profile_view.php" style="text-decoration: none;">
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
            <?php
                if ($role == 3)
                {
                    echo "<li> 
                        <a href='../view/partnereviews_view.php'> <span class='material-symbols-outlined'>rate_review</span> New Review </a> 
                        </li>
                        <li>
                            <a href='../view/pastreviews_view.php'> <span class='material-symbols-outlined'>history</span> Past Reviews </a> 
                        </li>";
                }
                else if ($role == 4)
                {
                    echo
                   " <li>
                        <a href='../view/conversations_view.php'> <span class='material-symbols-outlined'>chat</span> Conversations </a> 
                    </li>
                    <li>
                        <a href='../view/sourced_items.php'> <span class='material-symbols-outlined'>inventory</span> List Items </a> 
                    </li> 
                    <li>
                        <a href='../view/items_display.php'> <span class='material-symbols-outlined'>view_list</span> Items Display </a> 
                    </li> ";
                }
            ?>
            </ul>
        </div>
    </aside>

    <main>
        <section class="intro">
            <h1>Welcome to NicheNest</h1>
            <p>Your go-to platform for niche product reviews and personalized shopping assistance.</p>
        </section>

        <section class="roles">
        <?php
            if ($role == 3)
            {
                echo "<div class='role expert'>
                        <h2>For Experts</h2>
                        <p>
                            Share your expertise by reviewing niche products. Help users make informed decisions with your valuable insights.
                        </p>
                        <a href='../view/partnereviews_view.php' class='cta_btn'>Start a Review</a>
                     </div>";
            }
           else if ($role == 4)
           { 
            echo "<div class='role shopper'>
                    <h2>For Personal Shoppers</h2>
                    <p>
                        Connect users with hard-to-find items tailored to their needs. Use your skills to locate unique products.
                    </p>
                    <a href='../view/conversations_view.php' class='cta_btn'>Get Started</a>
                </div>";
            }
        ?>
        </section>

        <section class="features">
            <h2>Key Features</h2>
            <ul>
            <?php
                if ($role == 3)
                {
                    echo "<li><strong>Comprehensive Reviews:</strong> Explore and create detailed reviews for niche products.</li>";
                }
                else if ($role == 4)
                {
                    echo "<li><strong>Shopping Assistance:</strong> Help users locate rare or unique items.</li>";
                }
            ?>
            </ul>
        </section>
    </main>
    
    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
</html>
