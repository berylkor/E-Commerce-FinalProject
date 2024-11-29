<?php
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
                <?php
                    displayProfile();
                ?>
            </div>
            <a href="profile_view.php" style="text-decoration: none;">
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
                    <a href="partnereviews_view.php"> <span class="material-symbols-outlined">flight</span> Chat </a> 
                </li>
                <li>
                    <a href="pastreviews_view.php"> <span class="material-symbols-outlined">nightlife</span> List </a> 
                </li>
                <li>
                    <a href="cart_view.php"> <span class="material-symbols-outlined">nightlife</span> Cart </a> 
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="shopping-cart-container">
            <!-- Left Section: Shopping Bag -->
            <div class="cart-items">
                <h2>Shopping Bag</h2>
                <?php
                    display_cart()
                ?>
            </div>
        
            <!-- Right Section: Summary -->
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