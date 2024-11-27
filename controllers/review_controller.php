<?php
include_once("../classes/review_class.php");

function add_review_wimg_ctr($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url,  $filepath)
{
	$addreview=new review_class();
	return $addreview->add_review_wimg($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url,  $filepath);
}

function add_review_ctr($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url)
{
	$addreview=new review_class();
	return $addreview->add_review($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url,);
}

?>