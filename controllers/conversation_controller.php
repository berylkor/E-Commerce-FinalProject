<?php
//connect to the conversation class
include_once("../classes/conversation_class.php");

// function to call add shopper function from shopper class
function add_convo_ctr($customer, $shopper, $message, $sender)
{
	$addconvo = new conversation_class();
	return $addconvo->add_conversation($customer, $shopper, $message, $sender);
}

function get_convo_ctr($customer, $shopper)
{
	$getconvo = new conversation_class();
	return $getconvo->get_conversation($customer, $shopper);
}

?>