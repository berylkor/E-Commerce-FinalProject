<?php
//connect to the shipping class
include_once("../classes/shopper_class.php");

// function to call add shopper function from shopper class
function add_shopper_ctr($username, $email, $pnumber, $ppassword)
{
	$addexpert = new shopper_class();
	return $addexpert->add_shopper($username, $email, $pnumber, $ppassword);
}

?>