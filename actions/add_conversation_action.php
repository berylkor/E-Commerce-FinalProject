<?php
    include_once("../controllers/conversation_controller.php");
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // user details for sign up user
        $message = $_POST["message"];
        $user = $_SESSION["user_id"];
        $customer = $_SESSION["customer"];
        $shopper = $_SESSION["shopper"];

        // call function from controller to add the users
        $add = add_convo_ctr($customer, $shopper, $message, $sender);

        if ($add)
        {
            // redirect if successful
            header("Location: ../view/personalshopping.php");
        }
        else 
        {
            // redirect back
            header("Location: ../view/personalshopping.php?failed");
        }
    }       
    
?>