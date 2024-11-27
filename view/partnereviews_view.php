<?php
    include_once("../functions/display_profile.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner Reviews</title>
    <link rel="stylesheet" href="../css/partnereview.css">
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
        <div class="menu_content">
            <div class="menu_header">
                <h4>Menu</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <ul>
                <li> 
                    <a href="partnereviews_view.php"> <span class="material-symbols-outlined">flight</span> New Review </a> 
                </li>
                <li>
                    <a href="pastreviews_view.php"> <span class="material-symbols-outlined">nightlife</span> Past Reviews </a> 
                </li>
                <li>
                    <a href="personal_dashboard.html"> <span class="material-symbols-outlined">cardiology</span> Personal </a> 
                </li>
                <li id="logout"> <a href="logout.php"> <span class="material-symbols-outlined">logout</span> Logout </a> </li>
            </ul>
        </div>
    </aside>

    <main>
        <h3> Write and Share your review</h3>
        <form action="../actions/add_review_action.php" method="post" id="reviewform" name="inputform" enctype="multipart/form-data">
            <!-- Item Name Field -->
            <div>
                <label for="itemname">Item Name</label>
                <span class="material-symbols-outlined">edit</span>
            </div>
            <input type="text" id="itemname" name="itemname" placeholder="Enter the item name" required>
        
            <!-- Description Field -->
            <div>
                <label for="itemdesc">Describe Your Experience</label>
                <span class="material-symbols-outlined">description</span>
            </div>
            <textarea name="itemdesc" id="itemdesc" rows="5" placeholder="Write about your experience with the product" required></textarea>
            
            <!-- Score Field -->
            <div>
                <label for="itemscore">Rate Item</label>
                <span class="material-symbols-outlined">star_rate</span>
            </div>
            <input type="number" id="itemscore" name="itemscore" min="1" max="5" step="0.1" placeholder="Enter a score between 1 and 5" required>
        
            <!-- Theme Field -->
            <div>
                <label for="theme">Theme</label>
                <span class="material-symbols-outlined">palette</span>
            </div>
            <select name="theme" id="theme" required>
                <option value="0">--Select a Theme--</option>
                <option value="1">Media</option>
                <option value="2">Entertainment</option>
                <option value="3">Artifacts</option>
                <option value="4">Food Experiences</option>
                
            </select>
        
            <!-- Image Upload Field -->
            <div>
                <label for="itemimage"> Upload Item Image</label>
                <span class="material-symbols-outlined">photo_camera</span>
            </div>
            <input type="file" id="itemimage" name="itemimage" accept="image/*">
        
            <!-- URL Field -->
            <div>
                <label for="itemlink">Item Link</label>
                <span class="material-symbols-outlined">link</span>
            </div>
            <input type="url" id="itemlink" name="itemlink" placeholder="Paste the item's link here">
        
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