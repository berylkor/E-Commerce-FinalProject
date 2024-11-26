<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma/bulma.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body>
    <header>
        <h2>NicheNest</h2>
        <div>
            <button><a href="about_view.php" style="text-decoration: none;">About Us</a></button>
            <button><a href="landing_view.php" style="text-decoration: none;">Home</a></button>
        </div>
    </header>
    <main>
        <div class="container">
            <!-- Login Form -->
            <div class="form-box Login">
                <h2 class="animation" style="--D:0">Login</h2>
                <form action="../actions/login_action.php" method="post" name="loginform" id="loginform" onsubmit="return validateLoginForm()">
                    <div class="input-box animation" style="--D:1">
                        <input type="text" id="email" name="email" required>
                        <label for="email">Email</label>
                        <span class="material-symbols-outlined"> mail </span>
                    </div>
    
                    <div class="input-box animation" style="--D:2">
                        <input type="password" id="ppassword" name="ppassword" required>
                        <label for="ppassword">Password</label>
                        <span class="material-symbols-outlined"> lock </span>
                    </div>
    
                    <div class="input-box animation" style="--D:3">
                        <button class="btn" name="btn" type="submit">Login</button>
                    </div>
                    
                    <!-- Link to Sign up form -->
                    <div class="regi-link animation" style="--D:4">
                        <p>Don't have an account? <a href="signup_view.php" class="SignupLink">Sign Up</a></p>
                    </div>
                </form>
            </div>
            <div class="info-content Login">
                <img src="../images/nichelogo.jpeg" alt="logo" >
                <h2 class="animation" style="--D:0">WELCOME BACK!</h2>
                <p class="animation" style="--D:1"> Everything you need in one place</p>
            </div>

        </div>
    </main>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script></script>
</html>