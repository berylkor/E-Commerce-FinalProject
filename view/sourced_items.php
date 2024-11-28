<?php
    include_once("../functions/display_profile.php");
    include_once("../functions/display_users.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sourced Items</title>
    <link rel="stylesheet" href="../css/partnereview.css">
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
    </aside>

    <main>
        <h2>Upload Curated Niche Items for Customers</h2>
        <form action="../actions/add_items_action.php" method="post" id="reviewform" name="inputform" enctype="multipart/form-data">
            <!-- Item Name Field -->
            <div>
                <label for="itemname">Item Name</label>
                <span class="material-symbols-outlined">edit</span>
            </div>
            <input type="text" id="itemname" name="itemname" placeholder="Enter the item name" required>
            
            <!-- Score Field -->
            <div>
                <label for="itemprice">Item Price</label>
                <span class="material-symbols-outlined">star_rate</span>
            </div>
            <input type="number" id="itemprice" name="itemprice" min="1"  step="0.1" placeholder="Enter item price" required>

            <!-- Image Upload Field -->
            <div>
                <label for="image"> Upload Item Image</label>
                <span class="material-symbols-outlined">photo_camera</span>
            </div>
            <input type="file" id="itemimage" name="itemimage" accept="image/*">

            <!-- Theme Field -->
            <div>
                <label for="customer">Customer</label>
                <span class="material-symbols-outlined">palette</span>
            </div>
                <?php
                    echo display_users();
                ?>
            <!-- Submission Button -->
            <button type="submit" class="submit-btn">  Submit  </button>
        </form>
    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
</html>