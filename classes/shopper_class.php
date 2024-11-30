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

class shopper_class extends db_connection
{
    
    public function add_shopper($username, $email, $pnumber, $ppassword)
    {
        $ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$username =  mysqli_real_escape_string($ndb->db_conn(), $username);
		$email =  mysqli_real_escape_string($ndb->db_conn(), $email);
        $pnumber = mysqli_real_escape_string($ndb->db_conn(), $pnumber);
		$ppassword =  mysqli_real_escape_string($ndb->db_conn(), $ppassword);

        // sql select statement to check if the user exists
        $checkuser = "SELECT * FROM `shopper` WHERE `email` = '$email'";
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
        $sql="INSERT INTO `shopper`(`name`, `email`, `contact`, `password`, `role_id`) VALUES ('$username','$email', '$pnumber', '$hashpassword', '4')";
        $query = $this->db_query($sql);

    }

    public function get_shoppers()
    {
        $ndb = new db_connection();	
        $sql = "SELECT * FROM `shopper`";
        return $ndb->db_fetch_all($sql);
    }

    public function get_shopper_clients()
    {
        $ndb = new db_connection();	
        $sql = "SELECT * FROM `users` WHERE `privilege_id` != 1";
        return $ndb->db_fetch_all($sql);
    }

    public function get_a_shopper()
    {
        $ndb = new db_connection();	
        $sql = "SELECT `shopper_id` FROM `personal_shopper` ORDER BY RAND() LIMIT 1";
        return $ndb->db_fetch_one($sql);
    }
}

?>