<?php
    include_once("../controllers/shipping_controller.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $country = $_POST['country'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $customerid = $_SESSION['user_id'];
        
        if (add_shipping_ctr($country, $city, $street, $customerid))
        {
            header("Location:../view/cart_view.php");
            exit();
        }else
        {
            echo "Failed to add shipping";
        } 

        
    }

        
?>