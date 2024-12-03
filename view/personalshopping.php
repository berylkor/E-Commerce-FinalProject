<?php
include_once("../functions/display_profile.php");
include_once("../controllers/assign_controller.php");
include_once("../actions/add_conversation_action.php");
include_once("../functions/display_shoppername.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// retrieve the user id for the customer
$id = $_SESSION['user_id'];
// find the assigned personal shopper based on the user id
$assigns = get_assign_ctr($id);
// store the shoppers id
$shopper = $assigns['shopper_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Shopper</title>
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
            <a href="../view/about_view.php"> <button class="header_btn"> About Us</button></a>
            <a href="../view/welcome_view.php"> <button class="header_btn"> Home </button></a>
            <a href="../view/productreviews.html">  <button class="header_btn"> Rankings </button></a>
            <a href="../view/personalshopping.php">  <button class="header_btn"> Shopping </button></a>
            <a href="../view/logout.php">
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
            <img src="../images/candle ad.jpeg" alt="ads image" width="120px" height="120px">
            <a href="../view/candle.html" target="_blank" rel="noopener noreferrer">Ad Space</a> 
        </div>
        <hr>
        <div class="menu_content">
            <div class="menu_header">
                <h4>Menu</h4>
                <span class="material-symbols-outlined">menu</span>
            </div>
            <ul>
                <li> 
                    <a href="../view/personalshopping.php"> <span class="material-symbols-outlined">flight</span> Chat </a> 
                </li>
                <li>
                    <a href="../view/curatedlist_view.php"> <span class="material-symbols-outlined">nightlife</span> List </a> 
                </li>
                <li>
                    <a href="../view/cart_view.php"> <span class="material-symbols-outlined">nightlife</span> cart </a> 
                </li>
            </ul>
        </div>
    </aside>

    <main>
        <div class="chat_container">
            <!-- Chat Header -->
            <div class="chat_header">
                <!-- display the shopper's name -->
                 <?php displayShoppername($shopper); ?>
                <span class="material-symbols-outlined">close</span>
            </div>
    
            <!-- Chat Messages -->
            <div class="chat_messages">
                
            </div>
    
            <!-- Chat Input -->
            <form action="../actions/add_conversation_action.php" method="post" class="chat_input_form" id="chatForm">
                <input type="text" name="message" id="messageInput" placeholder="Enter message..." required />
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                <input type="hidden" name="sid" id="sid" value="<?php echo $shopper; ?>" />
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to load messages
    function loadMessages(customer_id, shopper_id) {
        $.ajax({
            url: "../actions/get_conversation_action.php",
            type: "POST",
            data: {
                customer_id: customer_id,
                shopper_id: shopper_id,
            },
            success: function (response) {
                try {
                    console.log("Raw response:", response);

                    // Parse response safely
                    let data = Array.isArray(response) ? response : JSON.parse(response);
                    console.log("Parsed data:", data);

                    // Clear the chat messages container
                    const chatContainer = $(".chat_messages");
                    chatContainer.empty();

                    // Dynamically append each message to the chat container
                    data.forEach((message) => {
                        console.log("Rendering message:", message);
                        const messageHtml = `
                            <div class="chat_message ${message.sender.toLowerCase()}">
                                <h5>${message.sender === 'Customer' ? 'Customer' : 'Shopper'}</h5>
                                <p>${message.message}</p>
                                <span class="timestamp">${message.sent_at}</span>
                            </div>`;
                        chatContainer.append(messageHtml);
                    });
                } catch (error) {
                    console.error("Error parsing JSON response:", error);
                }
            },
            error: function () {
                alert("Failed to load messages. Please try again.");
            },
        });
    }

    // Automatically load messages every 10 seconds
    const customer_id = $("#id").val();
    const shopper_id = $("#sid").val();

    setInterval(() => {
        loadMessages(customer_id, shopper_id);
    }, 10000);

    // Initial load
    loadMessages(customer_id, shopper_id);
</script>

</html>