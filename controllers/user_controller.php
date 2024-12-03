<?php
//connect to the user class
include_once("../classes/user_class.php");

// function to call add user function from user class
function add_user_ctr($username, $email, $pnumber, $ppassword, $country)
{
	$adduser=new user_class();
	return $adduser->add_user($username, $email, $pnumber, $ppassword, $country);
}

// function to call login user function from user class
function get_user_ctr($email, $ppassword)
{
	$getuser = new user_class();
	return $getuser->login_user($email, $ppassword);
}

// function to call edit privilege function from privilege class
function edit_privilege_ctr($user_id, $privilege_id)
{
	$privilege = new user_class();
	return $privilege->edit_user_privilege($user_id, $privilege_id);
}

// function to function to update the details of the customer with image in the users table
function update_user_wimgctr($image, $name, $email, $contact, $id)
{
	$update = new user_class();
	return $update->update_user_wimg($image, $name, $email, $contact, $id);
}

// function to function to update the details of the customer without image in the users table
function update_user_ctr($name, $email, $contact, $id)
{
	$update = new user_class();
	return $update->update_user($name, $email, $contact, $id);
}

?>