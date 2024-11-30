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

class privilege_class extends db_connection
{
	public function get_privilege()
	{
		$ndb = new db_connection();
        $sql = "SELECT * FROM `privileges`";
        return $ndb->db_fetch_all($sql);
	}

	public function get_a_privilege($id)
	{
		$ndb = new db_connection();
        $sql = "SELECT * FROM `privileges` WHERE `privilege_id` = '$id'";
        return $ndb->db_fetch_all($sql);
	}

}

?>