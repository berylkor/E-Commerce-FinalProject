<?php
include_once("../functions/display_profile.php");
include_once("../functions/display_personalshoppers.php");
include_once("../functions/display_customers.php");
include_once("../functions/display_match_form.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Management</title>
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
            <a href="../view/welcome_view.php"><button class="header_btn"> Home </button></a>
            <a href="../view/logout.php">
                <button class="header_btn"> Logout </button>
            </a>
        </div>
        <!-- User details -->
        <div class="user_container">
            <span class="material-symbols-outlined">account_circle</span>
            <div class="profile_details">
                <?php
                    displayProfile();
                ?>
            </div>
            <a href="../view/profile_view.php" style="text-decoration: none;">
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </a>
        </div>
    </header>

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
                    <a href="shopping_management.php"> <span class="material-symbols-outlined">flight</span> Personal Shopping </a> 
                </li>
                <li>
                    <a href=""> <span class="material-symbols-outlined">nightlife</span> Expert Reviews </a> 
                </li>
                <li>
                    <a href=""> <span class="material-symbols-outlined">nightlife</span> Cart </a> 
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="shopper_section">
            <h2>NicheNest Personal Shoppers</h2>
            <table>
                <thead>
                        <tr>
                            <th>Personal Shopper ID</th>
                            <th>Name</th>
                            <th>Theme</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                        display_personalshoppers();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="shopper_section">
            <h2>NicheNest Personal Customers</h2>
            <table>
                <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Theme</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                        display_customers();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="assign_shoppers_section">
            <h2>Match Shoppers and Customers</h2>
            
            <?php
                display_matchform();
            ?>
        </div>
    </main>
</body>
</html>