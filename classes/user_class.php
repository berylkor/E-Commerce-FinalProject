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
*User class to handle all functions related to users
*/
/**
 *@author Beryl A A Koram
 *
 */


class user_class extends db_connection
{
	public function add_user($username, $email, $pnumber, $ppassword, $country)
	{
		$ndb = new db_connection();	
        // sanitise the user input from the sign up form
		$username =  mysqli_real_escape_string($ndb->db_conn(), $username);
		$email =  mysqli_real_escape_string($ndb->db_conn(), $email);
        $pnumber = mysqli_real_escape_string($ndb->db_conn(), $pnumber);
		$ppassword =  mysqli_real_escape_string($ndb->db_conn(), $ppassword);
		$country =  mysqli_real_escape_string($ndb->db_conn(), $country);

        // sql select statement to check if the user exists
        $checkuser = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($ndb->db_conn(),$checkuser);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        // check if any record was returned
        if ($result)
        {
            // return to login if the user exits
            header("Location:../view/signup_view.php?user_exists");
        }

        // encrypt the password
        $hashpassword = password_hash($ppassword, PASSWORD_DEFAULT);
    
        // insert the user's details into the database
        $sql="INSERT INTO `users`(`name`, `email`, `contact`, `password`, `location`) VALUES ('$username','$email', '$pnumber', '$hashpassword', '$country')";
        return $this->db_query($sql);   
	}

    public function login_user($email, $ppassword)
    {
        $ndb = new db_connection();
        // sanitise user input from login form
		$email =  mysqli_real_escape_string($ndb->db_conn(), $email);
		$ppassword =  mysqli_real_escape_string($ndb->db_conn(), $ppassword);

        // sql select statement to compare user credentials
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = $ndb->db_fetch_all($sql);

        foreach($result as $row)
        {
            $userid = $row['user_id'];
            $username = $row['name'];
            $email = $row['email'];
            $hashpassword = $row['password'];
            $userRole = $row['role_id'];
            
            // verify the password provided matches the password in the database
            $verify = password_verify($ppassword, $hashpassword);

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
    
                try {
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
                    $mail->setFrom('berylkoram378@gmail.com', 'NichNest Login OTP'); 
                    $mail->addAddress($email); 
    
                    
                    $mail->isHTML(true); 
                    $mail->Subject = 'Your OTP';
                    $mail->Body    = 'Your OTP to login is: ' . $_SESSION['otp'];
    
                    // Sending email
                    $mail->send();
                    header("Location: ../view/verification_view.php"); 
                    exit();
                } catch (Exception $e) {
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

    public function get_customers()
    {
        $ndb = new db_connection();	
        $sql = "SELECT * FROM users WHERE role_id = '2'";
        return $ndb->db_fetch_all($sql);
    }

    public function get_customer($id)
    {
        $ndb = new db_connection();	
        $sql = "SELECT * FROM users WHERE `user_id` = '$id'";
        return $ndb->db_fetch_one($sql);
    }

    public function edit_user_privilege($user_id, $privilege_id)
    {
        $ndb = new db_connection();
        // Sanitize the inputs
        $user_id = mysqli_real_escape_string($ndb->db_conn(), $user_id);
        $privilege_id = mysqli_real_escape_string($ndb->db_conn(), $privilege_id);

        // SQL query to update the user's privilege
        $sql = "UPDATE `users` SET `privilege_id` = '$privilege_id' WHERE `user_id` = '$user_id'";
        return $this->db_query($sql);
    }

    public function update_user_wimg($image, $name, $email, $contact, $id)
    {
        $ndb = new db_connection();
        $image =  mysqli_real_escape_string($ndb->db_conn(), $image);
		$name =  mysqli_real_escape_string($ndb->db_conn(), $name);
        $email = mysqli_real_escape_string($ndb->db_conn(), $email);
		$contact =  mysqli_real_escape_string($ndb->db_conn(), $contact);

        $sql = "UPDATE `users` SET `image` = '$image', `name` = '$name', `email` = '$email', `contact` = '$contact' WHERE `user_id` = $id";
        return $this->db_query($sql);
    }

    public function update_user($name, $email, $contact, $id)
    {
        $ndb = new db_connection();
		$name =  mysqli_real_escape_string($ndb->db_conn(), $name);
        $email = mysqli_real_escape_string($ndb->db_conn(), $email);
		$contact =  mysqli_real_escape_string($ndb->db_conn(), $contact);

        $sql = "UPDATE `users` SET `name` = '$name', `email` = '$email', `contact` = '$contact' WHERE `user_id` = $id";
        return $this->db_query($sql);
    }

}


?>