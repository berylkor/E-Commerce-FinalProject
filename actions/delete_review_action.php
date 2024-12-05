<?php
    include_once "../controllers/review_controller.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Enable debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_GET['key']) )
    {
        $id = $_GET['key'];
    }
       
        if (delete_review_ctr($id))
        {
            header("Location:../admin/reviews_management.php");
            exit();
        }else
        {
            echo "Failed to delete";
        } 

        
?>