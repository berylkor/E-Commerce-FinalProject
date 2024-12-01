<?php
include_once("../functions/display_profile.php");
include_once("../controllers/assign_controller.php");
include_once("../actions/add_conversation_action.php");
include_once("../functions/display_customername.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$id = $_SESSION['user_id'];
$assigns = get_assigns_ctr($id);
$customer = $assigns['customer_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Customer</title>
    <link rel="stylesheet" href="../css/chat.css">
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
            <a href="dashboard_view.php"><button class="header_btn"> Home </button></a>
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
        <div class="menu_content">
            <div class="menu_header">
                <h4>Menu</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <ul>
                <li> 
                    <a href="partnereviews_view.php"> <span class="material-symbols-outlined">flight</span> Chat </a> 
                </li>
                <li>
                    <a href="pastreviews_view.php"> <span class="material-symbols-outlined">nightlife</span> List </a> 
                </li>
            
            </ul>
        </div>
    </aside>

    <main>
        <div class="chat_container">
            <!-- Chat Header -->
            <div class="chat_header">
                <!-- <h3>Chat with Personal Shopper</h3> -->
                 <?php displayCustomername($customer); ?>
                <span class="material-symbols-outlined">close</span>
            </div>
    
            <!-- Chat Messages -->
            <div class="chat_messages">
                <div class="chat_message customer">
                    <h5> John - Customer </h5>
                    <p>Hello, I need help with camera recommendations.</p>
                    <span class="timestamp">10:30 AM</span>
                </div>
                <div class="chat_message shopper">
                    <h5> Jane - Shopper </h5>
                    <p>Sure! Can you share your budget?</p>
                    <span class="timestamp">10:32 AM</span>
                </div>
                <div class="chat_message customer">
                    <h5> John - Customer </h5>
                    <p>I want something that was designed by Artisans</p>
                    <span class="timestamp">10:30 AM</span>
                </div>
                <div class="chat_message shopper">
                    <h5> Jane - Shopper </h5>
                    <p>Sure! Heres a list of the products I found <a href="curatedlist_view.php">Show more</a> </p>
                    <span class="timestamp">10:32 AM</span>
                </div>
                <div class="chat_message customer">
                    <h5> John - Customer </h5>
                    <p>Thank you</p>
                    <span class="timestamp">10:30 AM</span>
                </div>
            </div>
    
            <!-- Chat Input -->
            <form action="../actions/add_shopper_conversation_action.php" method="post" class="chat_input_form" id="chatForm">
                <input type="text" name="message" id="messageInput" placeholder="Enter message..." required />
                <input type="hidden" name="sid" id="sid" value="<?php echo $customer; ?>" />
                <button type="submit"> <span class="material-symbols-outlined">send</span> </button>
            </form>
        </div>
    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
<script src="../js/shopper.js"></script>
</html>