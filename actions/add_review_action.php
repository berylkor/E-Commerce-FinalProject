<?php
 include_once("../controllers/review_controller.php");
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
 }

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $review_item =  $_POST["itemname"];
    $review_desc =  $_POST["itemdesc"];
    $review_score =  $_POST["itemscore"];
    $review_theme =  $_POST["theme"];
    $review_url =  $_POST["itemlink"];
    $reviewer = $_SESSION["user_id"];

    if(isset($_FILES['itemimage']) && $_FILES['itemimage']['error'] != UPLOAD_ERR_NO_FILE)
        {
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
                    if(add_review_wimg_ctr($review_item, $reviewer, $review_score, $review_desc, $review_theme, $review_url,  $filepath))
                    {
                        header("Location:../view/pastreviews_view.php");
                        exit();
                    }
                    else
                    {
                        echo "Error";
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