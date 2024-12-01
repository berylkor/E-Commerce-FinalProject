<?php
//connect to the employee class
include_once("../classes/employee_class.php");

// function to add employee
function add_employee_ctr($username, $email, $ppassword, $role_id)
{
	$addemployee = new employee_class();
	return $addemployee->add_employee($username, $email, $ppassword, $role_id);
}

// function to get employeed details for login
function get_employee_ctr($email, $ppassword)
{
	$getemployee = new employee_class();
	return $getemployee->get_employee($email, $ppassword);
}
?>