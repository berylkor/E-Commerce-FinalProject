<?php
    include_once("../controllers/expert_controller.php");
    include_once("../controllers/employee_controller.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // user details for sign up user
        $user_name = $_POST["username"];
        $user_email = $_POST["email"];
        $user_number = $_POST["pnumber"];
        $user_pass = $_POST["ppassword"];
        $user_profession = $_POST["profession"];

        $employee = add_employee_ctr($user_name, $user_email, $user_pass, '3');
        if ($employee)
        {

            // call function from controller to add employee to the expert reviewer table
            $add = add_expert_ctr($user_name, $user_number, $user_profession, $employee);
            if ($add)
            {
                // redirect if successful
                header("Location: ../view/partner_login_view.php");
            }
            else 
            {   
                // redirect back to the signup
                header("Location: ../view/partners_view.php?reviewer_failed");
            }
        }
        else
        {
            // redirect back to the signup
            header("Location: ../view/partners_view.php?employee_failed");
        }

    }       
    
?>