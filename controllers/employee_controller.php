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

// function to update employee details with image 
function update_employee_wimgctr($name, $email, $image, $id)
{
	$updateemployee = new employee_class();
	return $updateemployee->update_employee_wimg($name, $email, $image, $id);
}

// function to update employee details 
function update_employee_ctr($name, $email, $id)
{
	$updateemployee = new employee_class();
	return $updateemployee->update_employee($name, $email, $id);
}
?>