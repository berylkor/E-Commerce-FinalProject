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

function add_expert_ctr($username, $email, $pnumber, $ppassword, $profession)
{
	$addexpert = new user_class();
	return $addexpert->add_expert($username, $email, $pnumber, $ppassword, $profession);
}

function add_shopper_ctr($username, $email, $pnumber, $ppassword)
{
	$addexpert = new user_class();
	return $addexpert->add_shopper($username, $email, $pnumber, $ppassword);
}
?>