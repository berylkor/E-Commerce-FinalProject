<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

    <header>
        <h2>NicheNest</h2>
        <div>
            <button><a href="about_view.php" style="text-decoration: none;">About Us</a></button>
            <button><a href="landing_view.php" style="text-decoration: none;">Home</a></button>
        </div>
    </header>
    <div class="container">
        <!-- Signup Form -->
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
                    <input type="text" id="pnumber" name="pnumber" required>
                    <label for="pnumber">Phone Number</label>
                    <span class="material-symbols-outlined"> call </span>
                </div>

                <div class="input-box animation" style="--li:21;">
                    <input type="password" id="ppassword" name="ppassword" required>
                    <label for="ppassword">Password</label>
                    <span class="material-symbols-outlined"> lock </span>
                </div>

                <div class="input-box animation" style="--li:22;">
                    <input type="text" id="country" name="country" required>
                    <label for="country">Country</label>
                    <span class="material-symbols-outlined"> globe </span>
                </div>

                <div class="input-box animation" style="--li:23;">
                    <button class="btn" id="btn" name="btn" type="submit">Sign Up</button>
                </div>

                <!-- Link to Login Form -->
                <div class="regi-link animation" style="--li:24;">
                    <p>Don't have an account? <a href="#" class="LoginLink">Login</a></p>
                </div>
            </form>
        </div>
        <div class="info-content Register">
            <h2 class="animation" style="--li:17;">WELCOME!</h2>
            <p class="animation" style="--li:18;">Get started with us today</p>
        </div>
    </div>
</body>
</html>