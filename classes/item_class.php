<?php
//connect to database class
require_once("../settings/db_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/**
*Items class to handle all functions related to Itemss
*/
/**
 *@author Beryl A A Koram
 *
 */


class items_class extends db_connection
{

    public function add_items($itemname, $price, $customer, $shopper, $image)
    {
        $ndb = new db_connection();	
        // sanitise the item input
		$itemname =  mysqli_real_escape_string($ndb->db_conn(), $itemname);
		$price =  mysqli_real_escape_string($ndb->db_conn(), $price);
        $customer = mysqli_real_escape_string($ndb->db_conn(), $customer);
        $shopper = mysqli_real_escape_string($ndb->db_conn(), $shopper);
        $image = mysqli_real_escape_string($ndb->db_conn(), $image);

         // insert the item's details into the database
         $sql="INSERT INTO `sourced_items`(`item_name`, `price`, `customer_id`, `shopper_id`, `item_img`) VALUES ('$itemname','$price', '$customer', '$shopper', '$image')";
         return $this->db_query($sql);
    
    }

    public function get_custom_items($custid)
    {
        $ndb = new db_connection();	
        $sql="SELECT * FROM `sourced_items` WHERE `customer_id` = '$custid'";
        return $ndb->db_fetch_all($sql);
    }
}


?>