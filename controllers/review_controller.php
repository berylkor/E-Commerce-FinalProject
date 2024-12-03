<?php
include_once("../classes/review_class.php");

function add_review_wimg_ctr($id, $review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url,  $filepath)
{
	$addreview=new review_class();
	return $addreview->add_review_wimg($id, $review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url,  $filepath);
}

function add_review_ctr($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url)
{
	$addreview=new review_class();
	return $addreview->add_review($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url,);
}

function add_product_ctr($review_item, $review_score)
{
	$addproduct=new review_class();
	return $addproduct->add_product($review_item, $review_score);
}
?>