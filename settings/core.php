<?php
//start session
session_start(); 

//for header redirection
ob_start();

//funtion to check for login
function check_login()
{
    if (!isset($_SESSION['user_id']))
    {
        header("Location:../view/login_view.php");
        die();
    }
}

//function to get user ID
function get_userid()
{
    return $_SESSION['user_id'];
}

//function to check for level (admin, customer, expert, personal shopper)
function check_role()
{
    if (isset($_SESSION['role_id']))
    {
        $role_id = $_SESSION['role_id'];
        return $role_id;
    }
}


?>