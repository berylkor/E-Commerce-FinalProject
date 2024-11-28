<?php
    include_once "../controllers/order_controller.php";
    include_once "../controllers/cart_controller.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        $customer_id = $_SESSION['user_id'];
        $invoice = rand(100000,999999);
        $order_date = date('Y-m-d');

        $cart_items = view_cart_ctr($customer_id);
        $addition = add_order_ctr($customer_id, $invoice, $order_date, 'pending');
        // var_dump($addition);

        if ($addition !== false)
        {
            foreach($cart_items as $cartitem)
            {
                $product_id = $cartitem['p_id'];
                $qty = $cartitem['qty'];
                $cart_id = $cartitem['c_id'];
                $details = add_orderdetails_ctr($addition, $product_id, $qty);
            }
            header("Location:../view/checkout_view.php");
            exit();
        }       
        else 
        {
            $error_message = " Error ";
            echo "<script>alert('$error_message');</script>";
        }  
                
    }
                
        
?>
