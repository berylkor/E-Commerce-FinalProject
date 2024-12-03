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


class expert_class extends db_connection
{
    public function add_expert($username, $pnumber, $profession, $employee_id)
    {
        $ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$username =  mysqli_real_escape_string($ndb->db_conn(), $username);
		$pnumber =  mysqli_real_escape_string($ndb->db_conn(), $pnumber);
        $profession = mysqli_real_escape_string($ndb->db_conn(), $profession);
		$employee_id =  mysqli_real_escape_string($ndb->db_conn(), $employee_id);
    
        // insert the user's details into the database
        $sql="INSERT INTO `reviewer`(`name`, `contact`, `profession`, `employee_id`) VALUES ('$username', '$pnumber', '$profession', '$employee_id')";
        return $this->db_query($sql);
    }

    public function get_expert($id)
    {
        $ndb = new db_connection();
        $sql = "SELECT * FROM `reviewer` WHERE `employee_id` = '$id'";
        return $this->db_fetch_one($sql);
    }

}