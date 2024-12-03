<?php
 include_once("../controllers/review_controller.php");
 include_once("../controllers/expert_controller.php");
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
 }

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // get inputs from post request
    $review_item =  $_POST["itemname"];
    $review_desc =  $_POST["itemdesc"];
    $review_score =  $_POST["itemscore"];
    $review_theme =  $_POST["theme"];
    $review_url =  $_POST["itemlink"];
    $reviewer = $_SESSION["user_id"];
    
    // get reviewer id from the employee id
    $review_id = get_expert_ctr($reviewer);
     // store the id so it can be use for insertinh the imsge
    $id = $review_id['reviewer_id']; 

    if(isset($_FILES['itemimage']) && $_FILES['itemimage']['error'] != UPLOAD_ERR_NO_FILE)
    {
            // prepare the image file
            $extensions = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
            $filetmppath = $_FILES['itemimage']['tmp_name'];
            $filename = $_FILES['itemimage']['name'];
            $filesize = $_FILES['itemimage']['size'];
            $filetype = $_FILES['itemimage']['type'];
            $fileextenstion = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (in_array($fileextenstion, $extensions) && $filesize < 2000000)
            {
                $directory = "../images/";
                $filepath = $directory.basename($filename);

                if (move_uploaded_file($filetmppath, $filepath))
                {   
                    $product = add_product_ctr($review_item, $review_score);
                    if ($product)
                    {
                        if(add_review_wimg_ctr($product, $review_item, $id, $review_score, $review_desc, $review_theme, $review_url,  $filepath))
                        {
                            header("Location:../view/pastreviews_view.php");
                            exit();
                        }
                        else
                        {
                            echo "Error adding review";
                        }
                    }
                    else
                    {
                        echo "Error adding product";
                        
                    }
                }
                else
                {
                    echo "Failed to upload file";
                }
            }
            else 
            {
                echo "Invalid file type or file exceeds 2MB Limit";
            }
    }
    else
    {
        $add = add_review_ctr($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url);
            if ($add !== false)
            {
                header("Location:../view/pastreviews_view.php");
                exit();
            }
            else
            {
                echo "Error";
            }
    }
}

?>