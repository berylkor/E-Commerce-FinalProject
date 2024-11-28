<?php
    include('../controllers/cart_controller.php');
    session_start();
    if (isset($_GET['key']))
    {
        $productid = $_GET['key'];
        $custid = $_SESSION['user_id'];

        if (increase_cart_ctr($productid, $custid))
        {
            header("Location: ../view/cart_view.php");
        }
    }


?>