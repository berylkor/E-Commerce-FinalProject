<?php
    include "../controllers/user_controller.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // user details for sign up user
        $user_name = $_POST["username"];
        $user_email = $_POST["email"];
        $user_number = $_POST["pnumber"];
        $user_pass = $_POST["ppassword"];
        $user_country = $_POST["country"];

        // call function from controller to add the users
        $register = add_user_ctr($user_name, $user_email, $user_number, $user_pass, $user_country);

        if ($register !== false)
        {
            // redirect if successful
            header("Location: ../view/login_view.php");
        }
        else 
        {
            // redirect back to the login if it does not work
            header("Location: ../view/login_view.php?signup_unsuccessful");
        }
    }
        
    
?>