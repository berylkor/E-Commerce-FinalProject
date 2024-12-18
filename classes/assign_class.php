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

        // sql select statement to insert a new assignment
        $sql = "INSERT INTO `assigned_customers` (`shopper_id`, `customer_id`) VALUES ('$shopper', '$customer')";
        return $this->db_query($sql);

    }

    public function get_assignment_by_customer($customer)
    {
        $ndb = new db_connection();	

        // sql select statement to get assignments by customer
        $sql = "SELECT * FROM `assigned_customers` WHERE `customer_id` = '$customer'";
        return $this->db_fetch_one($sql);

    }

    public function get_assignment_by_shopper($shopper)
    {
        $ndb = new db_connection();	

        // sql select statement to get assignments by shopper
        $sql = "SELECT * FROM `assigned_customers` WHERE `shopper_id` = '$shopper'";
        return $this->db_fetch_one($sql);

    }

    public function get_assignments()
    {
        $ndb = new db_connection();	

        $sql = "SELECT a.*, s.name as shopper_name, u.name as customer_name FROM `assigned_customers`as a INNER JOIN `shopper` as s ON a.shopper_id = s.shopper_id INNER JOIN `users` as u ON a.customer_id = u.user_id";
        return $this->db_fetch_all($sql);

    }

}

?>