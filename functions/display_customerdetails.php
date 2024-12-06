<?php
    include_once("../classes/user_class.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    
    function displayCustomerdetails()
    {
        $id = $_SESSION['user_id'];
        $displaycustomer = new user_class();
        $customername = $displaycustomer->get_customer($id);
        echo "<form action='../actions/update_user_action.php' method='post' name='profileform' id='profileform' enctype='multipart/form-data'>"; 
        if (!empty($customername['image']))
        {
            echo "<div>
                    <h3>Profile Image</h3>
                    <img src='".$customername['image']."' id='profileimage' name='profileimage' alt='profile image' >
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
                 <input type='text' id='username' name='username' value='".$customername['name']."' required>
            </div>
            <!-- User's email -->
            <div>
                <h3> Email</h3>
                <input type='text' id='useremail' name='useremail' value='".$customername['email']."' required>
            </div>
            <!-- User's phone number -->
            <div>
                <h3> Phone Number</h3>
                <input type='text' id='usernumber' name='usernumber' value='".$customername['contact']."' required>
            </div>
            <!-- Submission button -->
            <button type='submit'>Change Details</button>
        </form>";
    }

?>
<?php
    include_once("../classes/user_class.php");

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    
    function displayCustomerdetails()
    {
        $id = $_SESSION['user_id'];
        $displaycustomer = new user_class();
        $customername = $displaycustomer->get_customer($id);
        echo "<form action='../actions/update_user_action.php' method='post' name='profileform' id='profileform' enctype='multipart/form-data'>"; 
        if (!empty($customername['image']))
        {
            echo "<div>
                    <h3>Profile Image</h3>
                    <img src='".$customername['image']."' id='profileimage' name='profileimage' alt='profile image' >
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
                 <input type='text' id='username' name='username' value='".$customername['name']."' required>
            </div>
            <!-- User's email -->
            <div>
                <h3> Email</h3>
                <input type='text' id='useremail' name='useremail' value='".$customername['email']."' required>
            </div>
            <!-- User's phone number -->
            <div>
                <h3> Phone Number</h3>
                <input type='text' id='usernumber' name='usernumber' value='".$customername['contact']."' required>
            </div>
            <!-- Submission button -->
            <button type='submit'>Change Details</button>
        </form>";
    }

?>