<?php
include_once("../controllers/user_controller.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $customer_id = $_SESSION['user_id'];
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $usernumber = $_POST['usernumber'];
    $userpass = $_POST['userpass'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE)
    {
            // prepare the image file
            $extensions = ['jpeg', 'jpg', 'png', 'gif', 'webp'];
            $filetmppath = $_FILES['image']['tmp_name'];
            $filename = $_FILES['image']['name'];
            $filesize = $_FILES['image']['size'];
            $filetype = $_FILES['image']['type'];
            $fileextenstion = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (in_array($fileextenstion, $extensions) && $filesize < 2000000)
            {
                $directory = "../images/";
                $filepath = $directory.basename($filename);

                if (move_uploaded_file($filetmppath, $filepath))
                {   
                    // call function to update with the image
                    $update = update_user_wimgctr($filepath, $username, $useremail, $usernumber, $customer_id);
                    if ($update)
                    {
                        // redirect back to the profile page
                        header("Location:../view/profile_view.php");
                        exit();
                    }
                    else
                    {
                        echo "Error updating user details";
                        exit();
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
        // call function to update without the image
        $update = update_user_ctr( $username, $useremail, $usernumber, $customer_id);
        if ($update)
        {
            // redirect back to the profile page
            header("Location:../view/profile_view.php");
            exit();
        }
        else
        {
            echo "Error updating user details";
            exit();
        }
    }

}