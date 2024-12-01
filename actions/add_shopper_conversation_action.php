<?php
    include_once("../controllers/conversation_controller.php");
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // user details for sign up user
        $message = $_POST["message"];
        $customer = $_SESSION["user_id"];
        $shopper = $_POST["sid"];

        // call function from controller to add the conversation
        $add = add_convo_ctr($customer, $shopper, $message, 'shopper');

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