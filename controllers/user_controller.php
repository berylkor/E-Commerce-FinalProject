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


?>