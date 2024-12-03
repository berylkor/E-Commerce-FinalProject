<?php
//connect to the payment class
include_once("../classes/payment_class.php");



function add_pay_ctr($customer_id, $orderid, $totalamount, $currency)
{
	$addpayment = new payment_class();
	return $addpayment->add_payment($customer_id, $orderid, $totalamount, $currency);
}

?>
