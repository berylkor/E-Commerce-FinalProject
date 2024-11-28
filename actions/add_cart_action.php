<?php
    include_once "../controllers/cart_controller.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $productid = $_POST['itemid'];
        $customerid = $_SESSION['user_id'];
        $quantity = 1;
        
        if (add_cart_ctr($productid, $customerid, $quantity))
        {
            header("Location:../view/cart_view.php");
            exit();
        }else
        {
            echo "Failed to add to Cart";
        } 

        
    }

        
?>
