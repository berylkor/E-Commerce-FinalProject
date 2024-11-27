<?php
    include_once("../functions/display_profile.php");
    include_once("../functions/display_themereviews.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Rankings</title>
    <link rel="stylesheet" href="../css/ranking.css">
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

    <!-- Ad space -->
    <aside class="menu_container">
        <div class="container">
            <img src="../images/image.png" alt="" width="120px" height="120px">
            <p>Ad Space</p>
            <a href="#">Learn More</a> 
        </div>
        <hr>
        <div class="menu_content">
            <div class="menu_header">
                <h4>Themes</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <!-- Product Filtering within the provided categories -->
            <ul>
                <li> 
                    <input type="checkbox" name="" id="">
                    <a href=""> <span class="material-symbols-outlined">flight</span> Media </a> 
                </li>
                <li>
                    <input type="checkbox" name="" id="">
                    <a href=""> <span class="material-symbols-outlined">nightlife</span> Entertainment </a> 
                </li>
                <li>
                    <input type="checkbox" name="" id="">
                    <a href=""> <span class="material-symbols-outlined">cardiology</span> Artifacts </a> 
                </li>
                <li>
                    <input type="checkbox" name="" id="">
                    <a href=""> <span class="material-symbols-outlined">local_dining</span> Food Experiences </a> 
                </li>
                <li id="logout"> <a href="logout.php"> <span class="material-symbols-outlined">logout</span> Logout </a> </li>
            </ul>
        </div>
    </aside>
    
    <!-- Main section -->
    <main>
        <!-- Product listings under media -->
        <section id="media_container" class="list_container">
            <h2> Media </h2>
            <div class="grid_container">
                <!-- <div class="product_card">
                    <div class="top">
                        <h4 class="ranking_no">1</h4>
                        <p class="score">4.67 / 5.00</p>
                    </div>
                    <img src="../images/camera.jpg" alt="">
                    <p id="item_name">Camera Kit</p>
                    <div class="prod_description"> Comes with a camera, two extra lenses</div>
                    <a href="productreviews.html">Click for more</a>
                </div> -->
                <?php
                    display_themereviews(1)
                ?>
            </div>
        </section>

        <section id="ent_container" class="list_container">
            <h2> Entertainment </h2>
            <div class="grid_container">
                <!-- <div class="product_card">
                    <div class="top">
                        <h4 class="ranking_no">1</h4>
                        <p class="score">4.67 / 5.00</p>
                    </div>
                    <img src="../images/camera.jpg" alt="">
                    <p id="item_name">Camera Kit</p>
                    <div class="prod_description"> Comes with a camera, two extra lenses</div>
                    <a href="">Click for more</a>
                </div> -->
                <?php
                    display_themereviews(2)
                ?>
            </div>
        </section>

        <section id="artif_container" class="list_container">
            <h2> Artifacts </h2>
            <div class="grid_container">
                <!-- <div class="product_card">
                    <div class="top">
                        <h4 class="ranking_no">1</h4>
                        <p class="score">4.67 / 5.00</p>
                    </div>
                    <img src="../images/camera.jpg" alt="">
                    <p id="item_name">Camera Kit</p>
                    <div class="prod_description"> Comes with a camera, two extra lenses</div>
                    <a href="">Click for more</a>
                </div> -->
                <?php
                    display_themereviews(3)
                ?>
            </div>
        </section>

        <section id="food_container" class="list_container">
            <h2> Food Experiences</h2>
            <div class="grid_container">
                <!-- <div class="product_card">
                    <div class="top">
                        <h4 class="ranking_no">1</h4>
                        <p class="score">4.67 / 5.00</p>
                    </div>
                    <img src="../images/camera.jpg" alt="">
                    <p id="item_name">Camera Kit</p>
                    <div class="prod_description"> Comes with a camera, two extra lenses</div>
                    <a href="">Click for more</a>
                </div> -->
                <?php
                    display_themereviews(4)
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