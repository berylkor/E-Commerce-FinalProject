<?php
    include "../controllers/user_controller.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // user details for sign up user
        $user_name = $_POST["username"];
        $user_email = $_POST["email"];
        $user_number = $_POST["pnumber"];
        $user_pass = $_POST["ppassword"];
        $user_profession = $_POST["profession"];

        // call function from controller to add the users
        $add = add_expert_ctr($user_name, $user_email, $user_number, $user_pass, $user_profession);

        if ($add)
        {
            // redirect if successful
            header("Location: ../view/login_view.php");
        }
        else 
        {

            // redirect back to the login if it does not work
            header("Location: ../view/partners_view.php?signup_unsuccessful");
        }
    }       
    
?>