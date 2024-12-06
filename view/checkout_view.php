<?php
include_once("../settings/core.php");
check_login();
include_once("../functions/display_profile.php");
include_once("../functions/display_ordersummary.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['key']))
{
    $orderid = $_GET['key'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/checkout.css">
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
    <aside class="menu_container">
        <div class="container">
            <img src="../images/candle ad.jpeg" alt="ads image" width="120px" height="120px">
            <a href="../view/candle.html" target="_blank" rel="noopener noreferrer">Ad Space</a> 
            
        </div>
        <hr>
        <div class="menu_content">
            <div class="menu_header">
                <h4>Menu</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <ul>
                <li> 
                    <a href="../view/personalshopping.php"> <span class="material-symbols-outlined">chat</span> Chat </a> 
                    <a href="../view/personalshopping.php"> <span class="material-symbols-outlined">chat</span> Chat </a> 
                </li>
                <li>
                    <a href="../view/curatedlist_view.php"> <span class="material-symbols-outlined">list_alt</span> List </a> 
                    <a href="../view/curatedlist_view.php"> <span class="material-symbols-outlined">list_alt</span> List </a> 
                </li>
                <li>
                    <a href="../view/cart_view.php"> <span class="material-symbols-outlined">shopping_cart</span> cart </a> 
                    <a href="../view/cart_view.php"> <span class="material-symbols-outlined">shopping_cart</span> cart </a> 
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <?php
            display_ordersummary($orderid)
        ?>
    </main>

<!-- Page Footer -->
<footer>
    <p>&copy; 2024 NicheNest</p>
</footer> 
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="../js/orderpay.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>
</html>