<?php
    include_once('../settings/core.php');
    check_login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="shortcut icon" href="../images/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/checkout.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,100" />
</head>

<body>
    <header>
        <h3 id="Logo">NicheNest</h3>
        <div class="action_buttons">
            <a href="home_view.php"><button>Home</button></a>
            <a href="brand_view.php"><button>Brands</button></a>
            <a href="products_view.php"><button>Products</button></a>
            <a href="cart_view.php"><button>Cart</button></a>
            <a href="logout_view.php"><button>Logout</button></a>
        </div>
    </header>

    <main>
        <section id="contact">
            <h2>Payment Information</h2>
            <form id="paymentForm">
                <div class="form-group">
                    <div class="labelcontainer">
                        <label for="email">Email Address</label>
                        <span class="material-symbols-outlined"> mail </span>
                    </div>
                    <input type="email" id="email-address" required />
                </div>
                <div class="form-group">
                    <div class="labelcontainer">
                        <label for="first-name">First Name</label>
                        <span class="material-symbols-outlined"> person </span>
                    </div>
                    <input type="text" id="first-name" />
                </div>
                <div class="form-group">
                    <div class="labelcontainer">
                        <label for="last-name">Last Name</label>
                        <span class="material-symbols-outlined"> person </span>
                    </div>
                    <input type="text" id="last-name" />
                </div>
                <div class="form-group">
                    <div class="labelcontainer">
                        <label for="amount">Amount</label>
                        <span class="material-symbols-outlined"> paid </span>
                    </div>
                    <input type="tel" id="amount" required />
                </div>
                <div class="form-submit">
                    <button type="submit" onclick="payWithPaystack()">Pay</button>
                </div>
            </form>
        </section>
        <a id='backbtn' href='../view/cart_view.php'>Back</a>
    </main>

    <footer>
        <p>&copy; 2024 Your Website</p>
    </footer>
</body>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="../js/pay.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script></body>

</html>