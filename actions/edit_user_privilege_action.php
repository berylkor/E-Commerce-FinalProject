<?php
    include_once("../controllers/user_controller.php");
    include_once("../controllers/shopper_controller.php");
    include_once("../controllers/assign_controller.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // user details for sign up user
        $privilege = $_POST["privilege_id"];
        $customer = $_SESSION["user_id"];

        // call function from controller to add the users
        $edit = edit_privilege_ctr($customer, $privilege);

        if ($edit)
        {
            $shopper = get_a_shopper_ctr();
            $shopper_id = $shopper['shopper_id'];
            $assign = add_assign_ctr($shopper_id, $customer);
            if ($assign)
            { 
                $_SESSION['assigned_shopper'] = $shopper_id;
                // redirect if successful
                header("Location: ../view/personalshopping.php");
            }
        }
        else 
        {
            // redirect back
            header("Location: ../view/profile_view.php?failed");
        }
    }       
    
?>