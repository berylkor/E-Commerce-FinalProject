<?php
include_once("../functions/display_profile.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curated Items</title>
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

                <div class="cart-item">
                    <img src="../images/camera.jpg" alt="Floral Print Wrap Dress" class="item-image">
                    <div class="item-details">
                        <h4>Floral Print Wrap Dress</h4>
                        <p class="item-meta">WOMEN</p>
                        <p>Color: Blue | Size: 42</p>
                    </div>
                    <div class="item-price">$20.50</div>
                    <div class="item-quantity">
                        <button class="quantity-btn">-</button>
                        <input type="number" min="1">
                        <button class="quantity-btn">+</button>
                    </div>
                    <div class="item-total">$41.00</div>
                </div>
            </div>
        
            <!-- Right Section: Summary -->
            <div class="cart-summary">
                <h2>Calculated Shipping</h2>
                <div class="shipping-form">
                    <select>
                        <option value="" disabled selected>Country</option>
                        <option>Ghana</option>
                    </select>
                    <input type="text" placeholder="City">
                    <input type="text" placeholder="Street">
                    <button class="button update">Update</button>
                </div>
                
                <div class="cart-total">
                    <h3>Cart Total</h3>
                    <p>Cart Subtotal: <span>$71.50</span></p>
                    <p>Delivery<span>$4.00</span></p>
                    <h4>Total: <span>$67.50</span></h4>
                    <button class="button checkout">Checkout</button>
                </div>
            </div>
        </div>
        
    </main>

<!-- Page Footer -->
<footer>
    <p>&copy; 2024 NicheNest</p>
</footer>
</body>
</html>