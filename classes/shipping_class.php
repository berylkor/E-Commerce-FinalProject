<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*Shipping class to handle all functions related to the shipping
*/
/**
 *@author Beryl A A Koram
 *
 */

class shipping_class extends db_connection
{
	public function add_shipping($country, $city, $street, $customerid)
	{
		$ndb = new db_connection();	
		$country =  mysqli_real_escape_string($ndb->db_conn(), $country);
		$city =  mysqli_real_escape_string($ndb->db_conn(), $city);
		$street =  mysqli_real_escape_string($ndb->db_conn(), $street);
		$customerid =  mysqli_real_escape_string($ndb->db_conn(), $customerid);
    
        $sql="INSERT INTO `shipping_fees`(`country`, `city`, `street`, `customer_id`, `fee`) VALUES ('$country', '$city', '$street', '$customerid', '25.50')";
        return $this->db_query($sql);

	}

}

?>