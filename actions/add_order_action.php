<?php
    include_once("../controllers/order_controller.php");
    include_once("../controllers/cart_controller.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        $customer_id = $_SESSION['user_id'];
        $invoice = rand(100000,999999);
        $totalamount = $_POST['subtotal'];
        $deliveryfee = $_POST['deliveryfee'];
        $cart_items = view_cart_ctr($customer_id);
        $addition = add_order_ctr($customer_id, $invoice,  $totalamount, $deliveryfee);

        if ($addition !== false)
        {
            foreach($cart_items as $cartitem)
            {
                $product_id = $cartitem['product_id'];
                $qty = $cartitem['qty'];
                $cart_id = $cartitem['customer_id'];
                $details = add_orderdetails_ctr($addition, $product_id, $qty);
            }
            header("Location:../view/checkout_view.php?key=".$addition);
            exit();
        }       
        else 
        {
            $error_message = " Error ";
            echo "<script>alert('$error_message');</script>";
        }  
                
    }
                
        
?>
