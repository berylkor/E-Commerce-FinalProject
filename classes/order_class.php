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


class order_class extends db_connection
{
	public function add_order($customer_id, $invoice, $totalamount, $shippingfee)
	{
		$ndb = new db_connection();	
		$customer_id =  mysqli_real_escape_string($ndb->db_conn(), $customer_id);
		$invoice =  mysqli_real_escape_string($ndb->db_conn(), $invoice);
		$totalamount =  mysqli_real_escape_string($ndb->db_conn(), $totalamount);
		$shippingfee =  mysqli_real_escape_string($ndb->db_conn(), $shippingfee);
 
        $sql="INSERT INTO `orders`(`customer_id`, `invoice_no`, `total_amount`, `shipping_fee`) VALUES ('$customer_id', '$invoice', '$totalamount', '$shippingfee')";
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
    	// sanitise the input to be entered into the order details table
		$order_id =  mysqli_real_escape_string($ndb->db_conn(), $order_id);
		$product_id =  mysqli_real_escape_string($ndb->db_conn(), $product_id);
		$quantity =  mysqli_real_escape_string($ndb->db_conn(), $quantity);
        // get the unit price of the items
        $query = "SELECT `Price` FROM `sourced_items` WHERE `item_id` = '$product_id'";
        $result = $this->db_fetch_one($query);
        $unitprice = $result['Price'];
        // insert all values into the order details table
        $sql="INSERT INTO `order_details`(`order_id`, `item_id`, `quantity`, `unit_price`) VALUES ('$order_id', '$product_id', '$quantity', '$unitprice')";
        return $this->db_query($sql);
    }

    public function get_orderdetails($order_id)
    {
        $ndb = new db_connection();
        // sql statement for getting details of the customer's order for payment
        $sql = "SELECT orders.order_id, orders.invoice_no, order_details.quantity, order_details.unit_price, orders.shipping_fee, sourced_items.item_name, sourced_items.item_img
                FROM `orders`
                INNER JOIN `order_details` ON orders.order_id = order_details.order_id
                INNER JOIN `sourced_items` ON order_details.item_id = sourced_items.item_id WHERE orders.order_id ='$order_id'";
        // run sql statement and collect the details
        return $ndb->db_fetch_all($sql);
    }

}


?>