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
        $checkuser = "SELECT * FROM `reviewer` WHERE `email` = '$email'";
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
        $sql="INSERT INTO `reviewer`(`name`, `email`, `contact`, `password`, `profession`, `role_id`) VALUES ('$username','$email', '$pnumber', '$hashpassword', '$profession', '3')";
        return $this->db_query($sql);
    }

}