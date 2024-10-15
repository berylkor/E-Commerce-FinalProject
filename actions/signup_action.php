<?php
    include "../controllers/user_controller.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        $user_name = $_POST["username"];
        $user_email = $_POST["email"];
        $user_pass = $_POST["ppassword"];
        $user_country = $_POST["country"];

        $register = add_user_ctr($user_name, $user_email, $user_pass, $user_country);

        if ($register !== false)
        {
            header("Location: ../view/login_view.php");
        }
        else 
        {
            header("Location: ../view/login_view.php#");
        }
    }
        
    
?>