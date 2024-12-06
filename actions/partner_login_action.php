<?php
    include_once("../controllers/employee_controller.php");
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // fields for logging in
        $user_email = $_POST["email"];
        $user_pass = $_POST["ppassword"];

        // login function call
        $login = get_employee_ctr($user_email, $user_pass);
                
        if ($login)
        {
                header("Location:../view/dashboard_view.php");
                exit;
        }
        else
        {
            // redirect back to the login page if there is an error
            header("Location: ../view/partner_login_view.php?invalid_credentials");
            exit;
        }
    }

?>