<?php
//connect to the cart class
include_once("../classes/cart_class.php");

function view_cart_ctr($customerid)
{
	$viewcart=new cart_class();
	return $viewcart->view_cart($customerid);
}

function add_cart_ctr($productid, $customerid, $quantity)
{
	$addcart=new cart_class();
	return $addcart->add_cart($productid, $customerid, $quantity);
}

function delete_cart_item_ctr($productid, $custid)
{
	$deletecart=new cart_class();
	return $deletecart->delete_cart_item($productid, $custid);
} 

function decrease_cart_ctr($productid, $customerid)
{
	$decreasecart=new cart_class();
	return $decreasecart->decrease_cart($productid, $customerid);
}

function increase_cart_ctr($productid, $customerid)
{
	$increasecart=new cart_class();
	return $increasecart->increase_cart($productid, $customerid);
}

//--INSERT--//

//--SELECT--//

//--UPDATE--//

//--DELETE--//

?>