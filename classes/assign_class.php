<?php
//connect to database class
require_once("../settings/db_class.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/**
*Assign class to handle all functions related to matching customers and personal shoppers
*/
/**
 *@author Beryl A A Koram
 *
 */

class assign_class extends db_connection
{
    
    public function add_assignment($shopper, $customer)
    {
        $ndb = new db_connection();	
        // sanitise the data from the form
		$shopper =  mysqli_real_escape_string($ndb->db_conn(), $shopper);
		$customer =  mysqli_real_escape_string($ndb->db_conn(), $customer);

        // sql select statement to check if the user exists
        $sql = "INSERT INTO `assigned_customers` (`shopper_id`, `customer_id`) VALUES ('$shopper', '$customer')";
        return $this->db_query($sql);

    }
}

?>