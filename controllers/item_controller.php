<?php
//connect to the item class
include_once("../classes/item_class.php");

// function to call add item function from item class
function add_item_ctr($itemname, $price, $customer, $shopper, $image)
{
	$additems=new items_class();
	return $additems->add_items($itemname, $price, $customer, $shopper, $image);
}

?>