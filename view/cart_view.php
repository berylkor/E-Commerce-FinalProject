<?php
include_once("../settings/core.php");
check_login();
include_once("../functions/display_profile.php");
include_once("../functions/display_cart.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
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
            <a href="profile_view.php" style="text-decoration: none;">
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </a>
        </div>
    </header>
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
        <div class="shopping-cart-container">
            <!-- Shopping Bag -->
            <div class="cart-items">
                <h2>Shopping Bag</h2>
                <?php
                    display_cart()
                ?>
            </div>
        
            <!-- Summary -->
            <div class="cart-summary">
                <h2>Calculated Shipping</h2>
                <form action="../actions/add_shipping_action.php" method="post" class="shipping-form" name="shipping-form">
                    <select id="country" name="country">
                        <option value="" disabled selected>Country</option>
                        <option>Ghana</option>
                    </select>
                    <input type="text" placeholder="City" id="city" name="city">
                    <input type="text" placeholder="Street" id="street" name="street">
                    <button type="submit" name="update" class="button update">Update</button>
                </form>

                <?php
                    display_cart_total();
                ?>
            </div>
        </div>
        
    </main>

<!-- Page Footer -->
<footer>
    <p>&copy; 2024 NicheNest</p>
</footer>

</body>

<script src="../js/cart.js"></script>

</html>