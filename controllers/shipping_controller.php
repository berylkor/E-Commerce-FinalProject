<?php
//connect to the shipping class
include_once("../classes/shipping_class.php");

// function to call add shipping function from shipping class
function add_shipping_ctr($country, $city, $street, $customerid)
{
	$addshipping=new shipping_class();
	return $addshipping->add_shipping($country, $city, $street, $customerid);
}

?>