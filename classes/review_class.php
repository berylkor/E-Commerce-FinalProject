<?php

//connect to database class
require("../settings/db_class.php");
/**
*review class to handle all functions related to reviews
*/
/**
 *@author Beryl A A Koram
 *
 */


class review_class extends db_connection
{
	public function add_review_wimg($id, $review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url,  $filepath)
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

        $sql="INSERT INTO `reviews`(`product_id`, `name`, `reviewer_id`, `score`, `comment`, `theme`, `url`, `image`) VALUES ('$id', '$review_item', '$reviewer', '$review_score', '$review_desc', '$review_theme', '$review_url',  '$filepath')";
        return $this->db_query($sql); 
    }

    public function add_product($product_name, $score)
    {
        $ndb = new db_connection();
        $product_name = mysqli_real_escape_string($ndb->db_conn(), $product_name);
        $score = mysqli_real_escape_string($ndb->db_conn(), $score);

        // Check if the product exists in the reviews table
        $query = "SELECT * FROM `reviews` WHERE `name` = '$product_name'";
        $results = $this->db_fetch_all($query);

        if ($results) 
        {
            // Calculate the average score
            $scores = 0;
            $total = 0;
            foreach ($results as $result) {
                $scores += $result['score'];
                $total += 1;
            }
            $avg_score = $scores / $total;

            // Update the product's average score
            $update_sql = "UPDATE `products` SET `avg_score` = '$avg_score' WHERE `name` = '$product_name'";
            $update_result = $this->db_query($update_sql);

            if ($update_result) 
            {
                // Retrieve the product ID
                $select_sql = "SELECT `product_id` FROM `products` WHERE `name` = '$product_name'";
                $product = $this->db_fetch_one($select_sql);
                return $product['product_id'];
            } 
            else 
            {
                error_log("Failed to update product: $product_name");
                return false;
            }
        } 
        else 
        {
            // Insert new product if it does not exist
            $insert_sql = "INSERT INTO `products` (`name`, `avg_score`) VALUES ('$product_name', '$score')";
            $insert_result = $this->db_query($insert_sql);
             
            if ($insert_result) 
            {
                // Retrieve the product ID
                $select_sql = "SELECT `product_id` FROM `products` WHERE `name` = '$product_name'";
                $product = $this->db_fetch_one($select_sql);
                return $product['product_id'];
            } 
            else 
            {
                error_log("Failed to insert product: $product_name");
                return false;
            }
        }
    }


    public function add_review($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url, $id)
    {
        $ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$review_item =  mysqli_real_escape_string($ndb->db_conn(), $review_item);
		$reviewer =  mysqli_real_escape_string($ndb->db_conn(), $reviewer);
        $review_score = mysqli_real_escape_string($ndb->db_conn(), $review_score);
		$review_desc =  mysqli_real_escape_string($ndb->db_conn(), $review_desc);
		$review_theme =  mysqli_real_escape_string($ndb->db_conn(), $review_theme);
		$review_url =  mysqli_real_escape_string($ndb->db_conn(), $review_url);
		$id =  mysqli_real_escape_string($ndb->db_conn(), $id);

        $sql="INSERT INTO `reviews`(`name`, `reviewer_id`, `score`, `comment`, `theme`, `url`, `product_id`) VALUES ('$review_item', '$reviewer', '$review_score', '$review_desc', '$review_theme', '$review_url', '$id')";
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
        $sql = "SELECT reviews.*, products.avg_score, reviewer.name AS reviewer_name, reviewer.image AS reviewer_image FROM `reviews` INNER JOIN `products` ON products.product_id = reviews.product_id INNER JOIN `reviewer` ON reviews.reviewer_id = reviewer.reviewer_id WHERE reviews.product_id = '$product'";
        return $ndb->db_fetch_all($sql);
    }

    public function get_expertreviews()
    {
        $ndb = new db_connection();
        $sql = "SELECT * FROM `reviews`";
        return $ndb->db_fetch_all($sql);
    }

    public function deletereview($id)
    {
        $ndb = new db_connection();
        $sql = "DELETE FROM reviews WHERE review_id = '$id'";
        return $ndb->db_query($sql);
    }

}

?>