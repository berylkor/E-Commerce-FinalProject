<?php
    include_once("../controllers/product_controller.php");


    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $product_name = $_POST["pname"];
        $product_desc = $_POST["pdesc"];
        $product_brand = $_POST["brand"];
        $product_price = $_POST["price"];

        if(isset($_FILES['plogo']) && $_FILES['plogo']['error'] != UPLOAD_ERR_NO_FILE)
        {
            $extensions = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
            $filetmppath = $_FILES['plogo']['tmp_name'];
            $filename = $_FILES['plogo']['name'];
            $filesize = $_FILES['plogo']['size'];
            $filetype = $_FILES['plogo']['type'];
            $fileextenstion = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (in_array($fileextenstion, $extensions) && $filesize < 2000000)
            {
                $directory = "../images/";
                $filepath = $directory.basename($filename);

                if (move_uploaded_file($filetmppath, $filepath))
                {
                    if (add_product_wlogo_ctr($product_brand, $product_name, $product_desc, $product_price, $filepath))
                    {
                        header("Location:../view/products_view.php");
                        exit();
                    }
                    else
                    {
                        $error_message = " Error with adding product";
                        echo "<script>alert('$error_message');</script>";
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
            $addition = add_product_ctr($product_brand, $product_name, $product_desc, $product_price);
        
            if ($addition !== false)
            {
                header("Location:../view/products_view.php");
                exit();
            }       
            else 
            {
                $error_message = " Error with adding product";
                echo "<script>alert('$error_message');</script>";
            }
            
        }
      
                
    }
                
        
?>
