<?php
include_once("../functions/display_profile.php");
include_once("../functions/display_personalshoppers.php");
include_once("../functions/display_customers.php");
include_once("../functions/display_match_form.php");

// start a session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// store the role id 
$role = $_SESSION['role_id'];
if (!$role == 1)
{
    // redirect users if they are not meant to be
    header("../view/index.php");
}

// Enable debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
                    <a href="../admin/dashboard_view.php"> <span class="material-symbols-outlined">dashboard</span> Dashboard </a> 
                </li>
                <li> 
                    <a href="../admin/shopping_management.php"> <span class="material-symbols-outlined">shopping_bag</span> Personal Shopping </a> 
                </li>
                <li>
                    <a href="../admin/reviews_management.php"> <span class="material-symbols-outlined">rate_review</span> Expert Reviews </a> 
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
                            <th>Name</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                        display_customers();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="assignment_section">
            <h2>NicheNest Customer Assignments</h2>
            <table>
                <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Personal Shopper Name</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                        display_assignments();
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