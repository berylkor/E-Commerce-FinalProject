<?php
    include_once("../controllers/assign_controller.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // user details for sign up user
        $shopper = $_POST["shopper"];
        $customer = $_POST["customer"];

        // call function from controller to add the users
        $add = add_assign_ctr($shopper, $customer);

        if ($add)
        {
            // redirect if successful
            header("Location: ../admin/shopping_management.php?successful");
        }
        else 
        {
            // redirect back
            header("Location: ../admin/shopping_management.php?failed");
        }
    }       
    
?>