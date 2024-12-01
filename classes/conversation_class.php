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

class conversation_class extends db_connection
{
    
    public function add_conversation($customer, $shopper, $message, $sender)
    {
        $ndb = new db_connection();	
        // sanitise the data to be inserted into the conversation table
		$customer =  mysqli_real_escape_string($ndb->db_conn(), $customer);
        $shopper = mysqli_real_escape_string($ndb->db_conn(), $shopper);
		$message =  mysqli_real_escape_string($ndb->db_conn(), $message);
		$sender =  mysqli_real_escape_string($ndb->db_conn(), $sender);

        // sql select statement to check if the user exists
        $sql = "INSERT INTO `conversations` (`customer_id`, `shopper_id`, `message`, `sender`) VALUES ('$customer', '$shopper', '$message', '$sender')";
        return $this->db_query($sql);    

    }

}

?>