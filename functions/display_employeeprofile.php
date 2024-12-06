<?php
include_once("../classes/employee_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function displayEmployeeProfile()
{
  // get user details from session
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];

    $id = $_SESSION['user_id'];
   // initialise a new instance of the user class
    $displayemployee = new employee_class();
    // use function to get additional details 
    $employee = $displayemployee->get_employeedetails($id);
    if (!empty($employee['image']))
    {
                    
        echo "<img src='".$employee['image']."' width='30px' style='border-radius:20rem';>
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
<?php
include_once("../classes/employee_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function displayEmployeeProfile()
{
  // get user details from session
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];

    $id = $_SESSION['user_id'];
   // initialise a new instance of the user class
    $displayemployee = new employee_class();
    // use function to get additional details 
    $employee = $displayemployee->get_employeedetails($id);
    if (!empty($employee['image']))
    {
                    
        echo "<img src='".$employee['image']."' width='30px' style='border-radius:20rem';>
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