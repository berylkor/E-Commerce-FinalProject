<?php
    include("../settings/core.php");
    check_login();

    session_start();

    if (isset($_SESSION['user_email']) && isset($_SESSION['user_name']))
    {
        $email = $_SESSION['user_email'];
        $username = $_SESSION['user_name'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
    <header>
        <h2>NicheNest</h2>
        <div>
            <button><a href="home_view.php" style="text-decoration: none;">Home</a></button>
            <button><a href="reviews.html" style="text-decoration: none;">Expert Reviews</a></button>
            <button><a href="shopping.html" style="text-decoration: none;">Personal Shopping</a></button>
        </div>
        <div class="user_container">
            <img src="../images/fillin_profile.png" alt="logo" width="50px" height="50px">
            <div class="profile_details">
                <p>
                    <?php echo $username; ?>
                </p>
                <p>
                    <?php echo $email; ?>
                </p>
            </div>
            <a href="profile_view.php" style="text-decoration: none;">
                <span class="material-symbols-outlined">keyboard_arrow_down</span>
            </a>
        </div>
    </header>

    <main>
        <div class="personaldetails">
            <!-- background Space -->
            <div class="backgroundspace">
            </div>
            <div class="imagecontainer">
                <img src="../images/profile.jpeg" alt="user profile image" id="profileimage">
                <span class="material-symbols-outlined" id="upload"> add_a_photo </span>
                <input type="file" id="imageinput" name="imageinput" accept="image/*" style="display: none;">
            </div>
    
            <!-- Profile -->
            <div class="profile_container">
                <h5>Beryl Koram</h5>
                <!-- PUT A FIELD HERE THAT WILL HAVE POINTS THE PERSON
                     HAS FOR THE YEAR AND THE REMAINING POINTS TO REACH THE NEXT LEVEL -->
                <div class="phone_info">
                    <span>
                        <span class="material-symbols-outlined"> call </span>
                        <p>Phone Number</p>
                    </span>
                    <p>+233 50 000 0000</p>
                </div>
                <div class="email_info">
                    <span>
                        <span class="material-symbols-outlined"> mail </span>
                        <p>Email</p>
                    </span>
                    <p>beryl.k@gmail.com</p>
                </div>
                <div class="pass_info">
                    <span>
                        <span class="material-symbols-outlined"> lock </span>
                        <p>Current Password</p>
                    </span>
                    <p>*********</p>
                </div>
                <div class="btn_container">
                    <button>Change Details</button>
                </div>
                <div class="themes_info">
                    <input type="checkbox">
                    <label for="">Media</label><br>
                    <input type="checkbox">
                    <label for="">Entertainment</label><br>
                    <input type="checkbox">
                    <label for="">Artifacts</label><br>
                    <input type="checkbox">
                    <label for="">Food</label><br>
                </div>
            </div>
        </div>

        <!-- Payment Details -->
        <div class="payments">
            <div class="payment_container">
                <h4>Debit/Credit Card</h4>
                <form action="" method="post">
                    <div class="input_container">
                        <label for="cardnumber">Card Number</label>
                        <div class="input_field">
                            <input type="text" id="cardnumber" placeholder="5284 5284 5284 5284">
                            <div class="cardicons">
                                <i class="fab fa-cc-visa"></i>
                                <i class="fab fa-cc-mastercard"></i>
                                <i class="fab fa-cc-amex"></i>
                                <i class="fab fa-cc-jcb"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input_container">
                        <label for="expirydate">Expiration Date</label>
                        <input type="text" id="expirydate" placeholder="MM / YY">
                    </div>
                    <div class="input_container">
                        <label for="cvc">Security Code</label>
                        <input type="text" id="cvc" placeholder="CVC">
                    </div>
                    <p class="disclaimer">
                        By providing your card information, you allow <span id="brandname">NicheNest</span>  
                        to charge your card for future payments in accordance with their terms.
                    </p>
                    <button id="payment_btn">Confirm</button>
                </form>
            </div>
    
            <!-- Role Change -->
            <!-- <div class="roles_container">
                <p>Interested in being a personal shopper or a reviewer?</p>
                <form action="">
                    <label for="usertype">Partner:</label>
                    
                </form>
            </div> -->
        </div>

        <div class="logout_container">
            <ul>
                <li id="logout"> <a id="logout_link" href="logout.php"> <span class="material-symbols-outlined">logout</span> Logout </a> </li>
            </ul>
        </div>
    </main>
</body>
<script src="../js/profile.js"></script>
</html>