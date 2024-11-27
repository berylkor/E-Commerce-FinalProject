<?php
    include_once("../functions/display_profile.php");
    include_once("../functions/display_ureviews.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner Reviews</title>
    <link rel="stylesheet" href="../css/pastreview.css">
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
            <a href="about.html"><button class="header_btn"> About Us</button></a>
            <a href="dashboard.html"><button class="header_btn"> Home </button></a>
            <a href="logout.php">
                <button class="header_btn"> Logout </button>
            </a>
        </div>
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

    <!-- Ad Space -->
    <aside class="menu_container">
        <div class="container">
            <img src="../images/image.png" alt="" width="120px" height="120px">
            <p>Ad Space</p>
            <a href="#">Learn More</a> 
        </div>
        <hr>
    </aside>

    <!-- Page main -->
    <main>

        <section class="user-reviews">
            <h3>Products You Reviewed</h3>
            <div class="review-grid">
                <!-- <div class="review-card">
                    <img src="../images/product1.jpg" alt="Product Image">
                    <h4>Camera Kit</h4>
                    <p>Overall Score: 4.67</p>
                    <p>Artifact</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium soluta quam numquam perferendis aliquid nemo distinctio deleniti fuga consequuntur. Quis?</p>
                </div>
                <div class="review-card">
                    <img src="../images/product1.jpg" alt="Product Image">
                    <h4>Camera Kit</h4>
                    <p>Overall Score: 4.67</p>
                    <p>Artifact</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium soluta quam numquam perferendis aliquid nemo distinctio deleniti fuga consequuntur. Quis?</p>
                </div> -->
                <?php
                    display_ureviews();
                ?>
            </div>
        </section>

        <section class="other-reviews">
            <h3>Products Reviewed by Other Users</h3>
            <div class="review-grid">
                <?php
                    display_oreviews();
                ?>
            </div>
        </section>


    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
</html>