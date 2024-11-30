<?php
    include_once("../functions/display_profile.php");
    include_once("../functions/display_privileges.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
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
        <!-- Profile Image -->
        <form action="../view/subscription_view.php" method="post" name="profileform" id="profileform" enctype="">
            <div>
                <h3>Profile Image</h3>
                <img src="" id="profileimage" name="profileimage" alt="profile image">
            </div>
            <!-- User's name -->
            <div>
                 <h3> Name</h3>
                 <input type="text" id="username" name="username" value="Beryl Koram">
            </div>
            <!-- User's email -->
            <div>
                <h3> Email</h3>
                <input type="text" id="useremail" name="useremail" value="berylkoram378@gmail.com">
            </div>
            <!-- User's phone number -->
            <div>
                <h3> Phone Number</h3>
                <input type="text" id="username" name="username" value="0506204139">
            </div>
            <!-- User's password -->
            <h3>Password</h3>
            <input type="password" id="userpass" name="userpass" value="1234456">
            
            <input type="hidden" id="image" name="image" value="" accept="image/*">
            <!-- Submission button -->
            <button type="submit">Change Details</button>
        </form>

        <div class="other_container">
            <!-- displaying current theme -->
            <div class="theme_container">
                <h3>Your chosen theme: Media</h3>
            </div>
            
            <!-- privilege level table -->
            <div class="shopperlevel_container">
                <h3 id="tier_level">Customer Tier Level</h3>
                <form action="../view/subscription_view.php" method="post" name="levelform" id="levelform">  
                    <?php
                        display_privileges();
                    ?>
                    <button type="submit">Confirm</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>

</html>