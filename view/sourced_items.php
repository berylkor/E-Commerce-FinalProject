<?php
    include_once("../settings/core.php");
    check_login();
    include_once("../functions/display_employeeprofile.php");
    include_once("../functions/display_users.php");
    // start a session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // store the role id 
    $role = $_SESSION['role_id'];
    if ($role == 1)
    {
        // redirect users if they are not meant to be
        header("../view/welcome_view.php");
    } 
    else if ($role == 3)
    {
        header("../view/dashboard_view.php");
    }
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
            <a href="../view/about_view.php"><button class="header_btn"> About Us</button></a>
            <a href="../view/dashboard_view.php"><button class="header_btn"> Home </button></a>
            <a href="logout.php">
                <button class="header_btn"> Logout </button>
            </a>
        </div>
        <!-- User details -->
        <div class="user_container">
                <?php
                    displayEmployeeProfile();
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
        </div>
        <hr>
        <div class="menu_content">
            <div class="menu_header">
                <h4>Menu</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <ul>
            <?php
                if ($role == 3)
                {
                    echo "<li> 
                        <a href='../view/partnereviews_view.php'> <span class='material-symbols-outlined'>rate_review</span> New Review </a> 
                        </li>
                        <li>
                            <a href='../view/pastreviews_view.php'> <span class='material-symbols-outlined'>history</span> Past Reviews </a> 
                        </li>";
                }
                else if ($role == 4)
                {
                    echo
                   " <li>
                        <a href='../view/conversations_view.php'> <span class='material-symbols-outlined'>chat</span> Conversations </a> 
                    </li>
                    <li>
                        <a href='../view/sourced_items.php'> <span class='material-symbols-outlined'>inventory</span> List Items </a> 
                    </li>
                    ";
                }
            ?>
            </ul>
        </div>
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