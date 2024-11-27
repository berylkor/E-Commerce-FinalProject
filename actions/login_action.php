<?php
    include "../controllers/user_controller.php";
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // fields for logging in
        $user_email = $_POST["email"];
        $user_pass = $_POST["ppassword"];

        // login function call
        $login = get_user_ctr($user_email, $user_pass);
                
        if ($login)
        {
            if ($_SESSION['role_id'] == 2)
            {
                // redirect to the home page
                header("Location:../view/welcome_view.php");
                exit;
            }
            else if ($_SESSION['role_id'] == 3 or $_SESSION['role_id'] == 4)
            {
                header("Location:../view/dashboard_view.php");
                exit;
            }
        }
        else
        {
            // redirect back to the login page if there is an error
            header("Location: ../view/login_view.php?invalid_credentials");
            exit;
        }
    }

?>