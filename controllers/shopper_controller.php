<?php
//connect to the shipping class
include_once("../classes/shopper_class.php");

// function to call add shopper function from shopper class
function add_shopper_ctr($username, $number, $theme, $employee)
{
	$addshopper = new shopper_class();
	return $addshopper->add_shopper($username, $number, $theme, $employee);
}

function get_a_shopper_ctr()
{
	$getshopper = new shopper_class();
	return $getshopper->get_a_shopper();
}

function get_shopperinfo_ctr($id)
{
	$getshopper = new shopper_class();
	return $getshopper->get_shopperinfo($id);
}

?>