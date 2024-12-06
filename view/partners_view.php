<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partners</title>
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/login_header.css">
    <link rel="stylesheet" href="../css/partners.css">
    <link rel="shortcut icon" href="../images/favicon_io/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body>
    <!-- Page Header -->
    <header>
        <h2 id="nichelogo">NicheNest</h2>
        <div class="btn_container">
            <a href="../view/about_view.php">
                <button class="header_btn"> About Us</button>
            </a>
            <a href="../view/index.php">
                <button class="header_btn"> Home </button>
            </a>
        </div>
    </header>

    <main>
        <section class="role_selection">
            <h4>Which of Our Partners Are You Applying For?</h4>
            <form id="role_form">
                <div class="role_item">
                    <input type="radio" name="role_option" id="role_expert" value="expert">
                    <label for="role_expert">Expert Reviewer</label>
                </div>
                <div class="role_item">
                    <input type="radio" name="role_option" id="role_shopper" value="shopper">
                    <label for="role_shopper">Personal Shopper</label>
                </div>
                <button type="button" class="role_btn" id="confirm_role_btn">Confirm</button>
            </form>
            <p>
                Already have an account?
                <a href="../view/partner_login_view.php">Login Here</a>
            </p>
        </section>

        <div class="main-container hidden" id="content"> 
            <div class="welcome_container hidden" id="welcome">
                <!-- Welcome Box -->
                <img src="../images/NicheNest.png" alt="Company Logo">
                <h2>NicheNest</h2>
                <p>Let's make a change together</p>
            </div>

            <div class="form_container hidden" id="expert_form">    
                <h3>Expert Reviewers Signup Form</h3>
                <form action="../actions/add_expert_action.php" method="post" id="reviewerForm" class="inputform">
                    <div class="input-box">
                        <label for="username">Username</label>
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <input type="text" id="username" name="username" required>

                    <div class="input-box">
                        <label for="email">Email</label>
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <input type="email" id="email" name="email" required>

                    <div class="input-box">
                        <label for="pnumber">Phone Number</label>
                        <span class="material-symbols-outlined">call</span>
                    </div>
                    <input type="tel" id="pnumber" name="pnumber" required>

                    <div class="input-box">
                        <label for="ppassword">Password</label>
                        <span class="material-symbols-outlined">lock</span>
                    </div>
                    <input type="password" id="ppassword" name="ppassword" required>

                    <div class="input-box">
                        <label for="profession">Profession</label>
                        <span class="material-symbols-outlined">work</span>
                    </div>
                    <input type="text" id="profession" name="profession" required>

                    <button class="role_btn" type="submit">Signup</button>
                </form>
            </div>

            <div class="welcome_container hidden" id="welcome">
                <!-- Welcome Box -->
                <img src="../images/NicheNest.png" alt="Company Logo">
                <h2>NicheNest</h2>
                <p>Let's make a change together</p>
            </div>
            
            <div class="form_container hidden" id="shopper_form">
                <h3>Personal Shoppers Signup Form</h3>
                <form action="../actions/add_shopper_action.php" method="post" id="shopperForm" class="inputform">
                    <div class="input-box">
                        <label for="username">Username</label>
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <input type="text" id="username" name="username" required>

                    <div class="input-box">
                        <label for="email">Email</label>
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <input type="email" id="email" name="email" required>

                    <div class="input-box">
                        <label for="pnumber">Phone Number</label>
                        <span class="material-symbols-outlined">call</span>
                    </div>
                    <input type="tel" id="pnumber" name="pnumber" required>

                    <div class="input-box">
                        <label for="ppassword">Password</label>
                        <span class="material-symbols-outlined">lock</span>
                    </div>
                    <input type="password" id="ppassword" name="ppassword" required>

                    <button class="role_btn" type="submit">Signup</button>
                </form>
            </div>
        </div>
    </main>  

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2024 NicheNest</p>
    </footer>
</body>
<script src="../js/partners.js"></script>
</html>