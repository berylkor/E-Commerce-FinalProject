<?php
//connect to the assign class
include_once("../classes/assign_class.php");

// function to call the add assignment function from the assignment class
function add_assign_ctr($shopper, $customer)
{
	$addassign = new assign_class();
	return $addassign->add_assignment($shopper, $customer);
}

?>