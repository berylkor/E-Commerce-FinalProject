<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function displayProfile()
{
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];
    echo "<p>".$name."</p>
          <p>".$email."</p>";
}


?>