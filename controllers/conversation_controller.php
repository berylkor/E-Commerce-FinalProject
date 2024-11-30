<?php
//connect to the conversation class
include_once("../classes/conversation_class.php");

// function to call add shopper function from shopper class
function add_convo_ctr($customer, $message, $sender, $theme)
{
	$addconvo = new conversation_class();
	return $addconvo->add_conversation($customer, $message, $sender, $theme);
}

?>