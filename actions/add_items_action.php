<?php
    include_once("../controllers/item_controller.php");
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // item details for sign up item
        $itemname = $_POST["itemname"];
        $price = $_POST["itemprice"];
        $customer = $_POST["customer"];
        // $itemimage = $_POST["image"];
        $shopper = $_SESSION["user_id"];

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
                        if(add_item_ctr($itemname, $price, $customer, $shopper, $filepath))
                        {
                            header("Location:../view/items_display.php");
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
    }       
    
?>