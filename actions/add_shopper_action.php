<?php
    include_once("../controllers/shopper_controller.php");
    include_once("../controllers/employee_controller.php");


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // user details for sign up user
        $user_name = $_POST["username"];
        $user_email = $_POST["email"];
        $user_number = $_POST["pnumber"];
        $user_pass = $_POST["ppassword"];

        $employee = add_employee_ctr($user_name, $user_email, $user_pass, '4');
        if ($employee)
        {
            // call function from controller to add the employee table
            $add = add_shopper_ctr($user_name, $user_number,2,$employee);
            if ($add)
            {
                // redirect if successful
                header("Location: ../view/partner_login_view.php");
            }
            else 
            {
                // redirect back to the signup if shopper does not work
                header("Location: ../view/partners_view.php?shopper_failed");
            }
        }
        else
        {
            header("Location: ../view/partners_view.php?employee_failed");

        }

    }       
    
?>