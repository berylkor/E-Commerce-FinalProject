<?php

//connect to database class
require_once("../settings/db_class.php");
session_start();
/**
*Customer class to handle all functions related to customers
*/
/**
 *@author Beryl A A Koram
 *
 */


class order_class extends db_connection
{
	public function add_order($customer_id, $invoice, $order_date, $status)
	{
		$ndb = new db_connection();	
		$customer_id =  mysqli_real_escape_string($ndb->db_conn(), $customer_id);
		$invoice =  mysqli_real_escape_string($ndb->db_conn(), $invoice);
		$order_date =  mysqli_real_escape_string($ndb->db_conn(), $order_date);
		$status =  mysqli_real_escape_string($ndb->db_conn(), $status);
    
        $sql="INSERT INTO `orders`(`customer_id`, `invoice_no`, `order_date`, `order_status`) VALUES ('$customer_id', '$invoice', '$order_date', '$status')";
        if ($ndb->db_query($sql))
        {
            $insert = $ndb->db_insert_id();
            if ($insert > 0)
            {
                return $insert;
            }
            else
            {
                error_log("Insert ID unsuccessful");
                return false;
            }
        }
        else 
        {
            return false;
        }
        
	}

    public function add_orderdetails($order_id, $product_id, $quantity)
    {
        $ndb = new db_connection();	
		$order_id =  mysqli_real_escape_string($ndb->db_conn(), $order_id);
		$product_id =  mysqli_real_escape_string($ndb->db_conn(), $product_id);
		$quantity =  mysqli_real_escape_string($ndb->db_conn(), $quantity);
    
        $sql="INSERT INTO `orderdetails`(`order_id`, `product_id`, `qty`) VALUES ('$order_id', '$product_id', '$quantity')";
        return $this->db_query($sql);
    }

}


?>