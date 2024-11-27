<?php

//connect to database class
require("../settings/db_class.php");
/**
*User class to handle all functions related to users
*/
/**
 *@author Beryl A A Koram
 *
 */


class review_class extends db_connection
{
	public function add_review_wimg($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url,  $filepath)
	{
        $ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$review_item =  mysqli_real_escape_string($ndb->db_conn(), $review_item);
		$reviewer =  mysqli_real_escape_string($ndb->db_conn(), $reviewer);
        $review_score = mysqli_real_escape_string($ndb->db_conn(), $review_score);
		$review_desc =  mysqli_real_escape_string($ndb->db_conn(), $review_desc);
		$review_theme =  mysqli_real_escape_string($ndb->db_conn(), $review_theme);
		$review_url =  mysqli_real_escape_string($ndb->db_conn(), $review_url);
		$filepath =  mysqli_real_escape_string($ndb->db_conn(), $filepath);

        $sql="INSERT INTO `reviews`(`product_name`, `reviewer_id`, `score`, `comment`, `theme`, `url`, `image`) VALUES ('$review_item', '$reviewer', '$review_score', '$review_desc', '$review_theme', '$review_url',  '$filepath')";
        return $this->db_query($sql); 
    }

    public function add_review($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url)
    {
        $ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$review_item =  mysqli_real_escape_string($ndb->db_conn(), $review_item);
		$reviewer =  mysqli_real_escape_string($ndb->db_conn(), $reviewer);
        $review_score = mysqli_real_escape_string($ndb->db_conn(), $review_score);
		$review_desc =  mysqli_real_escape_string($ndb->db_conn(), $review_desc);
		$review_theme =  mysqli_real_escape_string($ndb->db_conn(), $review_theme);
		$review_url =  mysqli_real_escape_string($ndb->db_conn(), $review_url);

        $sql="INSERT INTO `reviews`(`product_name`, `reviewer_id`, `score`, `comment`, `theme`, `url`) VALUES ('$review_item', '$reviewer', '$review_score', '$review_desc', '$review_theme', '$review_url')";
        return $this->db_query($sql); 
    }

   public function get_youreviews($reviewer)
   {
        $ndb = new db_connection();
        $sql = "SELECT * FROM `reviews` WHERE `reviewer_id` = '$reviewer'";
        return $ndb->db_fetch_all($sql);
   }

   public function get_review_theme($themeid)
    {
		$ndb = new db_connection();
		$sql = "SELECT * FROM `themes` WHERE theme_id = '$themeid'";
		return $ndb->db_fetch_one($sql);
	}

    public function get_othereviews($reviewer)
    {
        $ndb = new db_connection();
        $sql = "SELECT * FROM `reviews` WHERE `reviewer_id` != '$reviewer'";
        return $ndb->db_fetch_all($sql);
    }

    public function get_themereviews($themeid)
    {
        $ndb = new db_connection();
        $sql = "SELECT * FROM `reviews` WHERE `theme` = '$themeid' ORDER BY `score` DESC";
        return $ndb->db_fetch_all($sql);
    }

    public function get_productreviews($product)
    {
        $ndb = new db_connection();
        $sql = "SELECT * FROM `reviews` WHERE `product_name` = '$product'";
        return $ndb->db_fetch_all($sql);
    }

}

?>