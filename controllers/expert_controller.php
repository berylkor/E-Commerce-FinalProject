<?php
//connect to the expert class
include_once("../classes/expert_class.php");

function add_expert_ctr($username, $pnumber, $profession, $employee_id)
{
	$addexpert = new expert_class();
	return $addexpert->add_expert($username, $pnumber, $profession, $employee_id);
}

?>