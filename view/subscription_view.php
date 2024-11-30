<?php
    include_once("../functions/display_profile.php");
    include_once("../functions/display_subscription.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // get privilege id from form
    $privilege = $_POST["privilege"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link rel="stylesheet" href="../css/subscription.css">
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
                <a href="../view/profile_view.php" style="text-decoration: none;">
                    <span class="material-symbols-outlined">keyboard_arrow_down</span>
                </a>
            </div>

    </header>

    <!-- Sidebar section -->
    <aside class="menu_container">
        <div class="container">
            <img src="" alt="ads" width="120px" height="120px">
            <p>Ad Space</p>
            <a href="#">Learn More</a> 
        </div>
        <hr>
    </aside>

    <main>
        <h3>Upgrade your subscription</h3>
        
        <?php
            display_subscription($privilege);
        ?>
    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>

<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="../js/pay.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>

</html>