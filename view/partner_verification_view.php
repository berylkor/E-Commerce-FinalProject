<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Verify Here</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/login_header.css">
    <link rel="shortcut icon" href="../images/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>

<body>
    <header>
        <h2 id="nichelogo">NicheNest</h2>
        <div class="btn_container">
            <a href="about_view.php">
                <button class="header_btn"> About Us</button>
            </a>
            <a href="index.php">
                <button class="header_btn"> Home </button>
            </a>
        </div>
    </header>
    <div class="main_container">
        <!-- OTP Form for users -->
        <div class="form-container">
            <h2> Verify Here </h2>
            <form action="../actions/partner_verification_action.php" method="post" id="loginForm" class="inputform">
                <div>
                    <label for="password">Verification <span>*</span></label>
                </div>
                <input type="text" id="pin" name="pin" placeholder="Type your Pin" required>
                <input type="submit" id='submit' name="otp" value="Verify">
                
            </form>
        </div>
    </div>
     <!-- Page Footer -->
     <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</html>