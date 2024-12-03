<?php

//connect to database class
require_once("../settings/db_class.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/**
*Customer class to handle all functions related to customers
*/
/**
 *@author Beryl A A Koram
 *
 */


class payment_class extends db_connection
{
	public function add_payment($customer_id, $orderid, $totalamount, $currency)
	{
		$ndb = new db_connection();	
		$customer_id =  mysqli_real_escape_string($ndb->db_conn(), $customer_id);
		$orderid =  mysqli_real_escape_string($ndb->db_conn(), $orderid);
		$totalamount =  mysqli_real_escape_string($ndb->db_conn(), $totalamount);
		$currency =  mysqli_real_escape_string($ndb->db_conn(), $currency);
 
        $sql="INSERT INTO `payment`(`customer_id`, `order_id`, `amount`, `currency`) VALUES ('$customer_id', '$orderid', '$totalamount', '$currency')";
        return $this->db_query($sql);
	}

}


?>