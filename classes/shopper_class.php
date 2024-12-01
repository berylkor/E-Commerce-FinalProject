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
    
    public function add_shopper($username,$number, $theme, $employee)
    {
        $ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$username =  mysqli_real_escape_string($ndb->db_conn(), $username);
		$number =  mysqli_real_escape_string($ndb->db_conn(), $number);
		$theme =  mysqli_real_escape_string($ndb->db_conn(), $theme);
		$employee =  mysqli_real_escape_string($ndb->db_conn(), $employee);
    
        // insert the user's details into the database
        $sql="INSERT INTO `shopper`(`name`, `contact`, `theme`, `employee_id`) VALUES ('$username', '$number', '$theme', '$employee')";
        return $this->db_query($sql);
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
        $sql = "SELECT `shopper_id` FROM `shopper` ORDER BY RAND() LIMIT 1";
        return $ndb->db_fetch_one($sql);
    }

    public function get_shopper($id)
    {
        $ndb = new db_connection();	
        $sql = "SELECT `name` FROM `shopper` WHERE `shopper_id` = '$id'";
        return $ndb->db_fetch_one($sql);
    }
}

?>