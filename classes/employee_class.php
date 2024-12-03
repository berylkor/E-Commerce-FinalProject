<?php
//connect to database class
require_once("../settings/db_class.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once( '../PHPMailer/src/Exception.php');
    require_once( '../PHPMailer/src/PHPMailer.php');
    require_once( '../PHPMailer/src/SMTP.php'); 
/**
*Employee class to handle all functions related to employees
*/
/**
 *@author Beryl A A Koram
 *
 */

class employee_class extends db_connection
{
    
    public function add_employee($username, $email, $ppassword, $role_id)
    {
        $ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$username =  mysqli_real_escape_string($ndb->db_conn(), $username);
		$email =  mysqli_real_escape_string($ndb->db_conn(), $email);
		$ppassword =  mysqli_real_escape_string($ndb->db_conn(), $ppassword);
		$role_id =  mysqli_real_escape_string($ndb->db_conn(), $role_id);

        // sql select statement to check if the user exists
        $checkuser = "SELECT * FROM `employee` WHERE `email` = '$email'";
        $query = mysqli_query($ndb->db_conn(),$checkuser);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        // check if any record was returned
        if ($result)
        {
            // return to login if the user exits
            header("Location:../view/partners_view.php?user_exists");
        }

        // encrypt the password
        $hashpassword = password_hash($ppassword, PASSWORD_DEFAULT);
    
        // insert the user's details into the database
        $sql="INSERT INTO `employee`(`name`, `email`, `password`, `role_id`) VALUES ('$username','$email','$hashpassword', '$role_id')";
        $query = $this->db_query($sql);
        if ($query)
        {
            return $this->db_insert_id();
        }

    }

    public function get_employee($email, $password)
    {
        $ndb = new db_connection();	
        // sanitise the employee input from the login form
        $email =  mysqli_real_escape_string($ndb->db_conn(), $email);
		$password =  mysqli_real_escape_string($ndb->db_conn(), $password);

        // sql select statement to compare employee credentials
        $sql = "SELECT * FROM `employee` WHERE email = '$email'";
        $result = $ndb->db_fetch_all($sql);

        foreach($result as $row)
        {
            $userid = $row['employee_id'];
            $username = $row['name'];
            $email = $row['email'];
            $hashpassword = $row['password'];
            $userRole = $row['role_id'];
            
            // verify the password provided matches the password in the database
            $verify = password_verify($password, $hashpassword);

            if ($verify)
            {
                // create session variable
                $_SESSION['user_id'] = $userid;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $username;
                $_SESSION['role_id'] = $userRole;
                // Generate OTP and store it in session
                $_SESSION['otp'] = rand(100000, 999999); //otp
                $_SESSION['otp_expires'] = time() + 120; // OTP expiration
    
                // Send OTP via PHPMailer
                //instance of the phpmailer
                $mail = new PHPMailer(true); 
    
                try 
                {
                    // Server settings 
                    // For TLS (Port 587)
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'berylkoram378@gmail.com';
                    $mail->Password = 'ezfp lcdy khas roav';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
    
                    // Recipients
                    $mail->setFrom('berylkoram378@gmail.com', 'NichNest Partner Login OTP'); 
                    $mail->addAddress($email); 
    
                    
                    $mail->isHTML(true); 
                    $mail->Subject = 'Your OTP';
                    $mail->Body    = 'Your OTP to login is: ' . $_SESSION['otp'];
    
                    // Sending email
                    $mail->send();
                    header("Location: ../view/partner_verification_view.php"); 
                    exit();
                } 
                catch (Exception $e) 
                {
                    echo "OTP could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                return true;
            }
            else 
            {
                return false;
            }
        }
    }

}

?>