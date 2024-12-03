<?php
//connect to the payment class
include_once("../classes/order_class.php");



function add_order_ctr($customer_id, $invoice, $totalamount, $shippingfee)
{
	$addorder = new order_class();
	return $addorder->add_order($customer_id, $invoice, $totalamount, $shippingfee);
}

function add_orderdetails_ctr($order_id, $product_id, $quantity)
{
	$addorderdetails = new order_class();
	return $addorderdetails->add_orderdetails($order_id, $product_id, $quantity);
}


?>
