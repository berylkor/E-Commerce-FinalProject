<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/login_header.css">
    <link rel="shortcut icon" href="../images/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body>
    <!-- Page Header -->
    <header>
        <h2 id="nichelogo">NicheNest</h2>
        <div class="btn_container">
            <a href="">
                <button class="header_btn"> About Us</button>
            </a>
            <a href="">
                <button class="header_btn"> Home </button>
            </a>
        </div>
    </header>

    <!-- Page container with main content -->
    <main>
        <div id="signup-container" class="main-container">
            <div class="welcome_container">
                <!-- Welcome Box -->
                <img src="../images/NicheNest.png" alt="Company Logo">
                <h2>NicheNest</h2>
                <p>Everything in you need one place</p>
            </div>
            <div class="form-container">
                <h2>Signup Form </h2>
                <form action="../actions/signup_action.php" method="post" id="signupForm" class="inputform">
                    <!-- Email field to signup -->
                    <div>
                        <label for="email">Email <span>*</span></label>
                        <span class="material-symbols-outlined"> mail </span>
                    </div>
                    <input type="email" id="email" name="email" required>

                    <!-- Name field to login -->
                    <div>
                        <label for="name">Full Name <span>*</span></label>
                        <span class="material-symbols-outlined"> mail </span>
                    </div>
                    <input type="text" id="fname" name="fname" required>

                     <!-- Phone field to login -->
                     <div>
                        <label for="name">Phone Number <span>*</span></label>
                        <span class="material-symbols-outlined"> mail </span>
                    </div>
                    <input type="text" id="pnumber" name="pnumber" required>

                     <!-- Country field to login -->
                     <div>
                        <label for="name">Country <span>*</span></label>
                        <span class="material-symbols-outlined"> mail </span>
                    </div>
                    <input type="text" id="country" name="country" required>
        
                    <!-- Password field to signup -->
                    <div>
                        <label for="password">Password <span>*</span></label>
                        <span class="material-symbols-outlined"> lock </span>
                    </div>
                    <input type="password" id="ppassword" name="ppassword" required>
        
                    <!--Signup Button  -->
                    <button type="submit">Signup</button>
        
                    <!-- Link to the sign up page -->
                    <p>
                        Already have an account 
                        <a href="login_view.php">Login here</a>
                    </p>
        
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