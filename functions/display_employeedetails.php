<?php
    include_once("../classes/employee_class.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    
    function displayEmployeedetails()
    {
        $id = $_SESSION['user_id'];
        $displayemployee = new employee_class();
        $employeename = $displayemployee->get_employeedetails($id);
        echo "<form action='../actions/update_employee_action.php' method='post' name='profileform' id='profileform' enctype='multipart/form-data'>"; 
        if (!empty($employeename['image']))
        {
            echo "<div>
                    <h3>Profile Image</h3>
                    <img src='".$employeename['image']."' id='profileimage' name='profileimage' alt='profile image' >
                    <input type='file' id='image' name='image' value='' accept='image/*'>
                </div>";  
        }
        else
        {
            echo "<div>
                        <span class='material-symbols-outlined' style='font-size: 100px; color: #ccc;'>account_circle</span>
                        <input type='file' id='image' name='image' value='' accept='image/*'>
                 </div>";
        }             
        
        echo 
            "<!-- User's name -->
            <div>
                 <h3> Name</h3>
                 <input type='text' id='username' name='username' value='".$employeename['name']."' required>
            </div>
            <!-- User's email -->
            <div>
                <h3> Email</h3>
                <input type='text' id='useremail' name='useremail' value='".$employeename['email']."' required>
            </div>
            <!-- Submission button -->
            <button type='submit'>Change Details</button>
        </form>";
    }

?>