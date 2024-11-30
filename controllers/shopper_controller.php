<?php
//connect to the shipping class
include_once("../classes/shopper_class.php");

// function to call add shopper function from shopper class
function add_shopper_ctr($username, $email, $pnumber, $ppassword)
{
	$addshopper = new shopper_class();
	return $addshopper->add_shopper($username, $email, $pnumber, $ppassword);
}

function get_a_shopper_ctr()
{
	$getshopper = new shopper_class();
	return $getshopper->get_a_shopper();
}

?>