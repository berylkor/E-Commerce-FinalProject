<?php
//connect to the expert class
include_once("../classes/expert_class.php");

function add_expert_ctr($username, $email, $pnumber, $ppassword, $profession)
{
	$addexpert = new expert_class();
	return $addexpert->add_expert($username, $email, $pnumber, $ppassword, $profession);
}

?>