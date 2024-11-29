<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*Brand class to handle all functions related to the product brands
*/
/**
 *@author Beryl A A Koram
 *
 */

class cart_class extends db_connection
{
	public function add_cart($productid, $customerid, $quantity)
	{
		$ndb = new db_connection();	
		$productid =  mysqli_real_escape_string($ndb->db_conn(), $productid);
		$customerid =  mysqli_real_escape_string($ndb->db_conn(), $customerid);
    
        $sql="SELECT * FROM `cart` WHERE `product_id` = '$productid' AND  `customer_id` = '$customerid'";
        $result = $this->db_fetch_one($sql);

        if ($result)
        {
            $qtyupdate = $result['qty'] + $quantity;
            $update = "UPDATE `cart` SET `qty` = '$qtyupdate' WHERE `product_id` = '$productid' AND `customer_id` = '$customerid'";
            return $this->db_query($update);
        }
        else
        {
            $sql = "INSERT INTO `cart` (`product_id`, `customer_id`, `qty`) VALUES ('$productid', '$customerid', '$quantity')";
            return $this->db_query($sql);
        }

	}

    public function view_cart($customerid)
	{
		$ndb = new db_connection();	
        $sql="SELECT * FROM `cart` WHERE `customer_id`  = '$customerid'";
        return $ndb->db_fetch_all($sql);
	}

    public function get_cart_product($productid)
    { 
		$ndb = new db_connection();	
        $sql = "SELECT * FROM  `sourced_items` WHERE `item_id` = '$productid'";
        return $ndb->db_fetch_one($sql);

    }

    public function delete_cart_item($productid, $customerid)
    {
		$ndb = new db_connection();	
		$sql = "DELETE FROM `cart` WHERE `product_id` = '$productid' AND `customer_id` = '$customerid'";
		return $ndb->db_query($sql);
    }

    public function decrease_cart($productid, $customerid)
    {
		$ndb = new db_connection();	
        $sql = "SELECT `qty` FROM `cart` WHERE `product_id` = '$productid' AND `customer_id` = '$customerid'";
        $qty = $ndb->db_fetch_one($sql);
        $qty_one = $qty['qty'];
        if ($qty_one > 1)
        {
            $newqty = $qty['qty'] - 1;
    
            $update = "UPDATE `cart` SET `qty` = '$newqty' WHERE `product_id` = '$productid' AND `customer_id` = '$customerid'";
            return $ndb->db_query($update);
        }
        else
        {
            $sql = "DELETE FROM `cart` WHERE product_id = '$productid' AND `customer_id` = '$customerid'";
		return $ndb->db_query($sql);
        }

    }

    public function increase_cart($productid, $customerid)
    {
		$ndb = new db_connection();	
        $sql = "SELECT `qty` FROM `cart` WHERE `product_id` = '$productid' AND `customer_id` = '$customerid'";
        $qty = $ndb->db_fetch_one($sql);

        $newqty = $qty['qty'] + 1;
        $update = "UPDATE `cart` SET `qty` = '$newqty' WHERE `product_id` = '$productid' AND `customer_id` = '$customerid'";
        return $ndb->db_query($update);
    }

    public function get_cart_delivery($customerid)
    {
        $ndb = new db_connection();	
        $sql = "SELECT `fee` FROM `shipping_fees` WHERE `customer_id` = '$customerid'";
        return $ndb->db_fetch_one($sql);
    }
}

?>