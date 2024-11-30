<?php
include_once("../classes/privilege_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_subscription($id)
{
    $displayprivilege = new privilege_class();
    $privileges = $displayprivilege->get_a_privilege($id);
    foreach ($privileges as $privilege)
    {
        echo 
        "<div>
            <h4>Subscription type: <p>".$privilege['tier']."</p></h4>
            <h4>Amount Due: <p>$".number_format($privilege['monthly_fee'], 2)."</p></h4>
            <form id='subscriptionform'>
                <h4>Payment Form</h4>
                <div>
                    <label for='email'>Email Address</label>
                    <input type='email' id='email-address' name='email-address' required/>
                </div>
                <input type='hidden' id='amount' name='amount' value='".$privilege['monthly_fee']."'/>
                
                <button id='submit' name='submit' onsubmit='payWithPaystack()'>Pay</button>
            </form>
        </div>";
    }
}


?>