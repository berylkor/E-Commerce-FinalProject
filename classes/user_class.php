<?php

//connect to database class
require_once("../settings/db_class.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/**
*User class to handle all functions related to users
*/
/**
 *@author Beryl A A Koram
 *
 */


class user_class extends db_connection
{
	public function add_user($username, $email, $pnumber, $ppassword, $country)
	{
		$ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$username =  mysqli_real_escape_string($ndb->db_conn(), $username);
		$email =  mysqli_real_escape_string($ndb->db_conn(), $email);
        $pnumber = mysqli_real_escape_string($ndb->db_conn(), $pnumber);
		$ppassword =  mysqli_real_escape_string($ndb->db_conn(), $ppassword);
		$country =  mysqli_real_escape_string($ndb->db_conn(), $country);

        // sql select statement to check if the user exists
        $checkuser = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($ndb->db_conn(),$checkuser);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        // check if any record was returned
        if ($result)
        {
            // return to login if the user exits
            header("Location:../view/signup_view.php?user_exists");
        }

        // encrypt the password
        $hashpassword = password_hash($ppassword, PASSWORD_DEFAULT);
    
        // insert the user's details into the database
        $sql="INSERT INTO `users`(`name`, `email`, `contact`, `password`, `location`) VALUES ('$username','$email', '$pnumber', '$hashpassword', '$country')";
        return $this->db_query($sql);   
	}

    public function login_user($email, $ppassword)
    {
        $ndb = new db_connection();
        // sanitise user input from login form
		$email =  mysqli_real_escape_string($ndb->db_conn(), $email);
		$ppassword =  mysqli_real_escape_string($ndb->db_conn(), $ppassword);

        // sql select statement to compare user credentials
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $ndb->db_fetch_all($sql);

        foreach($result as $row)
        {
            $userid = $row['user_id'];
            $username = $row['name'];
            $email = $row['email'];
            $hashpassword = $row['password'];
            $userRole = $row['role_id'];
            
            // verify the password provided matches the password in the database
            $verify = password_verify($ppassword, $hashpassword);

            if ($verify)
            {
                // create session variable
                $_SESSION['user_id'] = $userid;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $username;
                $_SESSION['role_id'] = $userRole;
                return true;
            }
            else 
            {
                return false;
            }
        }

    }

    public function add_expert($username, $email, $pnumber, $ppassword, $profession)
    {
        $ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$username =  mysqli_real_escape_string($ndb->db_conn(), $username);
		$email =  mysqli_real_escape_string($ndb->db_conn(), $email);
        $pnumber = mysqli_real_escape_string($ndb->db_conn(), $pnumber);
		$ppassword =  mysqli_real_escape_string($ndb->db_conn(), $ppassword);
		$profession =  mysqli_real_escape_string($ndb->db_conn(), $profession);

        // sql select statement to check if the user exists
        $checkuser = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($ndb->db_conn(),$checkuser);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        // check if any record was returned
        if ($result)
        {
            // return to login if the user exits
            header("Location:../view/partners_view.php?user_exists");
        }

        // encrypt the password
        $hashpassword = password_hash($ppassword, PASSWORD_DEFAULT);
    
        // insert the user's details into the database
        $sql="INSERT INTO `users`(`name`, `email`, `contact`, `password`, `profession`, `role_id`) VALUES ('$username','$email', '$pnumber', '$hashpassword', '$profession', '3')";
        return $this->db_query($sql);
    }

    public function add_shopper($username, $email, $pnumber, $ppassword)
    {
        $ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$username =  mysqli_real_escape_string($ndb->db_conn(), $username);
		$email =  mysqli_real_escape_string($ndb->db_conn(), $email);
        $pnumber = mysqli_real_escape_string($ndb->db_conn(), $pnumber);
		$ppassword =  mysqli_real_escape_string($ndb->db_conn(), $ppassword);

        // sql select statement to check if the user exists
        $checkuser = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($ndb->db_conn(),$checkuser);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        // check if any record was returned
        if ($result)
        {
            // return to login if the user exits
            header("Location:../view/partners_view.php?user_exists");
        }

        // encrypt the password
        $hashpassword = password_hash($ppassword, PASSWORD_DEFAULT);
    
        // insert the user's details into the database
        $sql="INSERT INTO `users`(`name`, `email`, `contact`, `password`, `role_id`) VALUES ('$username','$email', '$pnumber', '$hashpassword', '4')";
        $query = $this->db_query($sql);

    }

    public function get_customers()
    {
        $ndb = new db_connection();	
        $sql = "SELECT * FROM users WHERE role_id = '2'";
        return $ndb->db_fetch_all($sql);
    }
}


?>