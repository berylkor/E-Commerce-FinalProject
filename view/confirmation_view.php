<?php
include_once("../functions/display_profile.php");
if (isset($_GET['key']) && isset($_GET['value']))
{
    $orderid = $_GET['key'];
    $amount = $_GET['value'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="../css/confirmation.css">
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
            <a href="profile_view.php" style="text-decoration: none;">
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </a>
        </div>
    </header>
    <aside class="menu_container">
        <!-- Link to "ad" -->
        <div class="container">
            <img src="../images/candle ad.jpeg" alt="ads image" width="120px" height="120px">
            <a href="../view/candle.html" target="_blank" rel="noopener noreferrer">Ad Space</a> 
        </div>
        <hr>
    </aside>

    <main>
        <form action="../actions/confirmation_action.php" method="post" class="confirmation-container">
            <h1>Thank You for Your Payment!</h1>
            <p>Your payment has been successfully processed.</p>
            
            <div class="order-summary">
                <h2>Order Summary</h2>
                <p><strong>Amount Paid: $<?php echo number_format($amount, 2); ?></strong></p>
            </div>
            <input type="hidden" name="amount" value="<?php echo $amount ?>">
            <input type="hidden" name="orderid" value="<?php echo $orderid ?>">
            <div class="actions">
                <button type="submit" class="btn">Continue Shopping</button>
            </div>
        </form>
    </main>
<!-- Page Footer -->
<footer>
    <p>&copy; 2024 NicheNest</p>
</footer> 
</body>
</html>