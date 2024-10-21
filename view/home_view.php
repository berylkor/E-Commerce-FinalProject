<?php
    include("../settings/core.php");
    check_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/welcome.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <header>
        <h2>NicheNest</h2>
        <div>
            <button><a href="about_view.php" style="text-decoration: none;">About Us</a></button>
            <button><a href="reviews.html" style="text-decoration: none;">Expert Reviews</a></button>
            <button><a href="shopping.html" style="text-decoration: none;">Personal Shopping</a></button>
        </div>
        <div class="user_container">
            <img src="../images/fillin_profile.png" alt="logo" width="50px" height="50px">
            <div class="profile_details">
                <p>Beryl Koram</p>
                <p>beryl.k@gmail.com</p>
            </div>
            <span class="material-symbols-outlined">keyboard_arrow_down</span>
        </div>
    </header>

    <div class="menu_container">
        <div class="container">
            <img src="../images/glass.png" alt="" width="120px" height="120px">
            <p>Learn More</p> 
        </div>
        <div class="menu_content">
            <div class="menuheader">
                <h4>Themes</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <ul>
                <li> <a href=""> <span class="material-symbols-outlined">flight</span> Travel </a> </li>
                <li> <a href=""> <span class="material-symbols-outlined">nightlife</span> Media </a> </li>
                <li> <a href=""> <span class="material-symbols-outlined">cardiology</span> Health </a> </li>
                <li> <a href=""> <span class="material-symbols-outlined">local_dining</span> Food </a> </li>
                <li id="logout"> <a href="logout.php"> <span class="material-symbols-outlined">logout</span> Logout </a> </li>
            </ul>
        </div>
    </div>

    <main>
        <div class="ratings_section">
            <div class="rankinglist">
                <div class="top">
                    <p> 6 September 2024 </p>
                    <span id="trophy" class="material-symbols-outlined">emoji_events</span>
                </div>
                <h2> Weekly Ranking List </h2>
                <div class="tag">
                    <p>Prada</p>
                    <p>Canon</p>
                    <p>Hilton</p>
                </div>  
                <button>Details</button>
            </div>

            <div class="expertreviews">
                <div class="top">
                    <p> 6 September 2024 </p>
                    <span id="rating" class="material-symbols-outlined">reviews</span>
                </div>
                <h2> Expert Ratings </h2>
                <div class="tag">
                    <p>Content Creator</p>
                    <p>Entrepreneur</p>
                    <p>Restaurateur</p>
                </div>  
                <button>Details</button>
            </div>
        </div>

        <div class="personalshopping_section">
            <div class="shopperchat">
                <div class="top">
                    <p> 6 September 2024 </p>
                    <span id="bubble" class="material-symbols-outlined">maps_ugc</span>
                </div>
                <h2>Chat with Shoppers</h2>
                <div class="tag">
                    <p>Hotels</p>
                    <p>Restaurants</p>
                    <p>Clothes</p>
                </div>
                <div class="btn"> 
                    <button>Start Chat</button>
                    <button>Place Order</button>
                </div>
            </div>
            <div class="curatedlist">
                <div class="top">
                    <p> 6 September 2024 </p>
                    <span id="token" class="material-symbols-outlined">token</span>
                </div>
                <h2>Niche Curated List</h2>
                <div class="tag">
                    <p>Hotels</p>
                    <p>Restaurants</p>
                    <p>Clothes</p>
                </div>
                <div class="btn">
                    <button>Start Chat</button>
                    <button>Place Order</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>