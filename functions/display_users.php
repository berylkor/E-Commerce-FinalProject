<?php
include_once("../classes/user_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_users()
{
    $displayuser = new user_class();
    $users = $displayuser->get_customers();
    
    $select = "<select name='customer' id='customer' required>
                    <option value='1' disabled selected> Select a Customer </option>";
    foreach ($users as $user)
    {
        $option = "<option value='".$user["user_id"]."'>".$user["name"]."</option>";
        $select = $select.$option;
    }
    $select = $select."</select>";
    return $select;
}


?>