<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma/bulma.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <header>
        <h2>NicheNest</h2>
        <div>
            <button><a href="home.html" style="text-decoration: none;">Home</a></button>
            <button>About Us</button>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="curved-shape"></div>
            <div class="curved-shape2"></div>
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
    
                    <div class="regi-link animation" style="--D:4">
                        <p>Don't have an account? <a href="#" class="SignupLink">Sign Up</a></p>
                    </div>
                </form>
            </div>
            <div class="info-content Login">
                <h2 class="animation" style="--D:0">WELCOME BACK!</h2>
                <p class="animation" style="--D:1"> Everything you need in one place</p>
            </div>

            <div class="form-box Register">
                <h2 class="animation" style="--li:17;">Sign Up</h2>
                <form action="../actions/signup_action.php" method="post" name="signupform" id="signupform" onsubmit="return validateSignupForm()">
                    <div class="input-box animation" style="--li:18;">
                        <input type="text" id="username" name="username" required>
                        <label for="username">Username</label>
                        <span class="material-symbols-outlined"> person </span>
                    </div>

                    <div class="input-box animation" style="--li:19;">
                        <input type="text" id="email" name="email" required>
                        <label for="email">Email</label>
                        <span class="material-symbols-outlined"> mail </span>
                    </div>
    
                    <div class="input-box animation" style="--li:20;">
                        <input type="password" id="ppassword" name="ppassword" required>
                        <label for="ppassword">Password</label>
                        <span class="material-symbols-outlined"> lock </span>
                    </div>

                    <div class="input-box animation" style="--li:21;">
                        <input type="text" id="country" name="country" required>
                        <label for="country">Country</label>
                        <span class="material-symbols-outlined"> globe </span>
                    </div>
    
                    <div class="input-box animation" style="--li:22;">
                        <button class="btn" id="btn" name="btn" type="submit">Sign Up</button>
                    </div>
    
                    <div class="regi-link animation" style="--li:23;">
                        <p>Don't have an account? <a href="#" class="LoginLink">Login</a></p>
                    </div>
                </form>
            </div>
            <div class="info-content Register">
                <h2 class="animation" style="--li:17;">WELCOME!</h2>
                <p class="animation" style="--li:18;">Get started with us today</p>
            </div>
        </div>
    </main>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="../js/login.js"></script>
</html>