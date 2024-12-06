<?php
include_once("../classes/user_class.php");
include_once("../classes/user_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function displayProfile()
{
  // get user details from session
  // get user details from session
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];

    $id = $_SESSION['user_id'];
   // initialise a new instance of the user class
    $displaycustomer = new user_class();
    // use function to get additional details 
    $customer = $displaycustomer->get_customer($id);
    if (!empty($customer['image']))
    {
                    
        echo "<img src='".$customer['image']."' width='30px' style='border-radius:20rem';>
              <div class='profile_details'>
                <p>".$name."</p>
                <p>".$email."</p>
              </div>";
    }
    else
    {
        // display a generic icon if the user has not set a profile image
        echo "<span class='material-symbols-outlined'>account_circle</span>
              <div class='profile_details'>
                <p>".$name."</p>
                <p>".$email."</p>
              </div>";
    }

    $id = $_SESSION['user_id'];
   // initialise a new instance of the user class
    $displaycustomer = new user_class();
    // use function to get additional details 
    $customer = $displaycustomer->get_customer($id);
    if (!empty($customer['image']))
    {
                    
        echo "<img src='".$customer['image']."' width='30px' style='border-radius:20rem';>
              <div class='profile_details'>
                <p>".$name."</p>
                <p>".$email."</p>
              </div>";
    }
    else
    {
        // display a generic icon if the user has not set a profile image
        echo "<span class='material-symbols-outlined'>account_circle</span>
              <div class='profile_details'>
                <p>".$name."</p>
                <p>".$email."</p>
              </div>";
    }
}


?>