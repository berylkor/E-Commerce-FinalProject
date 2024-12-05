<?php
    include_once("../settings/core.php");
    check_login(); // check that the user is logged in
    include_once("../functions/display_employeeprofile.php");
    include_once("../controllers/shopper_controller.php");
    include_once("../functions/display_item.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $id = $_SESSION['user_id'];
    // retrieve their shopper id using the employee id
    $shopper = get_shopperinfo_ctr($id);
    $sid = $shopper['shopper_id'];
    // store the role id 
    $role = $_SESSION['role_id'];
    if ($role == 1)
    {
        // redirect users if they are not meant have access to the page
        header("../view/welcome_view.php");
    } 
    else if ($role == 4)
    {
        // redirect users if they are not meant to have access to the page
        header("../view/dashboard_view.php");
    } 

    // Enable debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sourced Items List</title>
    <link rel="stylesheet" href="../css/curatedlist.css">
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
            <a href="../view/about_view.php"><button class="header_btn"> About Us</button></a>
            <a href="../view/dashboard_view.php"><button class="header_btn"> Home </button></a>
            <a href="../view/logout.php">
                <button class="header_btn"> Logout </button>
            </a>
        </div>
        <div class="user_container">
                <?php
                    displayEmployeeProfile();
                ?>
            <a href="../view/employee_profile_view.php" style="text-decoration: none;">
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </a>
        </div>
    </header>

    <!-- Ad Space -->
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
                    <li>
                        <a href='../view/items_display.php'> <span class='material-symbols-outlined'>view_list</span> Items Display </a> 
                    </li> ";
                }
            ?>
            </ul>
        </div>
    </aside>

    <main>
        
        <h1>Sourced Items List</h1>
        <div class="item-container">

            <?php
                display_shopper_items($id);
            ?>

        </div>
        
    </main>
    
    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
</html>
