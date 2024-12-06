<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            <a href="about_view.php">
                <button class="header_btn"> About Us</button>
            </a>
            <a href="index.php">
                <button class="header_btn"> Home </button>
            </a>
        </div>
    </header>

    <!-- Main container with main content -->
    <main>
        <div class="main-container">
            <div class="welcome_container">
                <!-- Welcome Box -->
                <img src="../images/NicheNest.png" alt="Company Logo">
                <h2>NicheNest</h2>
                <p>Everything in you need one place</p>
            </div>
            <div class="form-container">
                <h2>Login Form </h2>
                <form action="../actions/login_action.php" method="post" id="loginForm" class="inputform">
                    <!-- Email field to login -->
                    <div>
                        <label for="email">Email <span>*</span></label>
                        <span class="material-symbols-outlined"> mail </span>
                    </div>
                    <input type="email" id="email" name="email" required>
        
                    <!-- Password field to login -->
                    <div>
                        <label for="password">Password <span>*</span></label>
                        <span class="material-symbols-outlined"> lock </span>
                    </div>
                    <input type="password" id="ppassword" name="ppassword" required>
        
                    <!--Login Button  -->
                    <button type="submit">Login</button>
        
                    <!-- Link to the sign up page -->
                    <p>
                        Don't have an account? 
                        <a href="signup_view.php">Sign up here</a>
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