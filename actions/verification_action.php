<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['otp'])) {
        $entered_otp = $_POST['pin'];

        if ($_SESSION['otp'] == $entered_otp && time() <= $_SESSION['otp_expires']) {
            // OTP is valid
            unset($_SESSION['otp']); 
            unset($_SESSION['otp_expires']);

            $role = $_SESSION['role_id'];
            if ($role == 2)
            {
                header("Location: ../view/welcome_view.php");
            }
            else
            {
                header("Location: ../admin/dashboard_view.php");
            }
            exit();
        } else {
            echo "<script>alert('Invalid or Expired OTP!'); window.location.href = '../view/login_view.php';</script>";

        }
    } else {
        echo "<script>alert('No OTP was generated. Please request a new OTP.'); window.location.href = '../view/login_view.php';</script>";

    }
}
?>
