<?php
include_once("../classes/privilege_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_privileges()
{
    $displayprivilege = new privilege_class();
    $privileges = $displayprivilege->get_privilege();
    foreach ($privileges as $privilege)
    {
        echo "<div>
                <input type='radio' name='privilege' id='".$privilege['tier']."' value='".$privilege['privilege_id']."'>
                <div class='input_container'>
                    <label for='privilege'>".$privilege['tier']."</label>
                    <h4>Price: $".number_format($privilege['monthly_fee'],2)." / per month | Tier points: ".$privilege['tier_points']."</h4>
                    
                </div>   
             </div>";
    }
}


?>