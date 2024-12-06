<?php
include_once("../controllers/payment_controller.php");
include_once("../classes/order_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../PHPMailer/src/Exception.php');
require_once('../PHPMailer/src/PHPMailer.php');
require_once('../PHPMailer/src/SMTP.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get inputs for the payment table
    $customer_id = $_SESSION['user_id'];
    $totalamount = $_POST['amount'];
    $orderid = $_POST['orderid'];
    $customer_id = $_SESSION['user_id'];
    $totalamount = $_POST['amount'];
    $orderid = $_POST['orderid'];

    if (!$customer_id || !$totalamount || !$orderid) {
        echo "Missing required parameters.";
        exit();
    }

    // Sanitize inputs
    $customer_id = htmlspecialchars($customer_id);
    $totalamount = htmlspecialchars($totalamount);
    $orderid = htmlspecialchars($orderid);
    $customer_id = htmlspecialchars($customer_id);
    $totalamount = htmlspecialchars($totalamount);
    $orderid = htmlspecialchars($orderid);

    // Use the payment controller to add to the payment table
    $addition = add_pay_ctr($customer_id, $orderid, $totalamount, "GHS");

    if ($addition !== false) {
        $displaysummary = new order_class();
        $summarys = $displaysummary->get_orderdetails($orderid);

        if (!$summarys) {
            echo "Failed to retrieve order details.";
            exit();
        }

        // Generate the invoice content
        $invoicecontent = "
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Invoice</title>
            </head>
            <body style='width: 90%; height: 100%; background-color: #f9f9fc; padding: 2rem; font-family: Poppins, sans-serif; margin: 0; box-sizing: border-box;'>
                <div style='border: 1px solid #ddd; padding: 1rem;'>
                    <div style='width: 100%; color: #ffffff; background-color: #6A5ACD; padding: 1.5rem; text-align: center; border-radius: 10px;'>
                        <h3 style='font-family: \"Great Vibes\", cursive; font-size: 3rem; margin: 0;'>NicheNest</h3>
                        <p style='margin: 0;'>Everything you need in one place</p>
            <body style='width: 90%; height: 100%; background-color: #f9f9fc; padding: 2rem; font-family: Poppins, sans-serif; margin: 0; box-sizing: border-box;'>
                <div style='border: 1px solid #ddd; padding: 1rem;'>
                    <div style='width: 100%; color: #ffffff; background-color: #6A5ACD; padding: 1.5rem; text-align: center; border-radius: 10px;'>
                        <h3 style='font-family: \"Great Vibes\", cursive; font-size: 3rem; margin: 0;'>NicheNest</h3>
                        <p style='margin: 0;'>Everything you need in one place</p>
                    </div>
                    <div style='padding: 1.5rem;'>
                    <div style='padding: 1.5rem;'>
                        <p>Hello,</p>
                        <p>Thank you for your order. Your payment has been processed, and you can find your invoice below:</p>
                    </div>
                    <table style='width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;'>
                        <tr style='background-color: #6A5ACD; color: #ffffff;'>
                            <td style='padding: 1rem; font-weight: bold; text-align: left;'>Order Number</td>
                            <td style='padding: 1rem; text-align: right;'>" . htmlspecialchars($summarys[0]['invoice_no']) . "</td>
                        </tr>
                    </table>
                    <table style='width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;'>
                        <thead>
                            <tr style='background-color: #f2f4ff;'>
                                <th style='padding: 1rem; text-align: left;'>Item</th>
                                <th style='padding: 1rem; text-align: center;'>Quantity</th>
                                <th style='padding: 1rem; text-align: right;'>Price</th>
                            </tr>
                        </thead>
                        <tbody>";
            $total = 0;
            foreach ($summarys as $summary) {
                $itemtotal = $summary['quantity'] * $summary['unit_price'];
                $total += $itemtotal;
                    <table style='width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;'>
                        <tr style='background-color: #6A5ACD; color: #ffffff;'>
                            <td style='padding: 1rem; font-weight: bold; text-align: left;'>Order Number</td>
                            <td style='padding: 1rem; text-align: right;'>" . htmlspecialchars($summarys[0]['invoice_no']) . "</td>
                        </tr>
                    </table>
                    <table style='width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;'>
                        <thead>
                            <tr style='background-color: #f2f4ff;'>
                                <th style='padding: 1rem; text-align: left;'>Item</th>
                                <th style='padding: 1rem; text-align: center;'>Quantity</th>
                                <th style='padding: 1rem; text-align: right;'>Price</th>
                            </tr>
                        </thead>
                        <tbody>";
            $total = 0;
            foreach ($summarys as $summary) {
                $itemtotal = $summary['quantity'] * $summary['unit_price'];
                $total += $itemtotal;

                $invoicecontent .= "
                            <tr style='border-bottom: 1px solid #ddd;'>
                                <td style='padding: 1rem; text-align: left;'>" . htmlspecialchars($summary['item_name']) . "</td>
                                <td style='padding: 1rem; text-align: center;'>" . htmlspecialchars($summary['quantity']) . "</td>
                                <td style='padding: 1rem; text-align: right;'>$ " . number_format($itemtotal, 2) . "</td>
                            </tr>";
            }
            $ordertotal = ceil($total + $summarys[0]['shipping_fee'] + 5);
            $invoicecontent .= "
                        </tbody>
                    </table>
                    <table style='width: 100%; border-collapse: collapse;'>
                        <tr>
                            <td style='padding: 1rem; text-align: left;'>Subtotal</td>
                            <td style='padding: 1rem; text-align: right;'>$ " . number_format($total, 2) . "</td>
                        </tr>
                        <tr>
                            <td style='padding: 1rem; text-align: left;'>Delivery</td>
                            <td style='padding: 1rem; text-align: right;'>$ " . number_format($summarys[0]['shipping_fee'], 2) . "</td>
                        </tr>
                        <tr>
                            <td style='padding: 1rem; text-align: left;'>Tax</td>
                            <td style='padding: 1rem; text-align: right;'>$ " . number_format(5, 2) . "</td>
                        </tr>
                        <tr style='font-weight: bold;'>
                            <td style='padding: 1rem; text-align: left;'>Order Total</td>
                            <td style='padding: 1rem; text-align: right;'>$ " . number_format($ordertotal, 2) . "</td>
                        </tr>
                    </table>
                    <div style='margin-top: 1.5rem; text-align: center;'>
                        <p style='font-size: 1rem;'>Your order is being processed and will be delivered soon.</p>
                        <p style='font-size: 0.7rem;'>NicheNest &copy; | All Rights Reserved</p>
                $invoicecontent .= "
                            <tr style='border-bottom: 1px solid #ddd;'>
                                <td style='padding: 1rem; text-align: left;'>" . htmlspecialchars($summary['item_name']) . "</td>
                                <td style='padding: 1rem; text-align: center;'>" . htmlspecialchars($summary['quantity']) . "</td>
                                <td style='padding: 1rem; text-align: right;'>$ " . number_format($itemtotal, 2) . "</td>
                            </tr>";
            }
            $ordertotal = ceil($total + $summarys[0]['shipping_fee'] + 5);
            $invoicecontent .= "
                        </tbody>
                    </table>
                    <table style='width: 100%; border-collapse: collapse;'>
                        <tr>
                            <td style='padding: 1rem; text-align: left;'>Subtotal</td>
                            <td style='padding: 1rem; text-align: right;'>$ " . number_format($total, 2) . "</td>
                        </tr>
                        <tr>
                            <td style='padding: 1rem; text-align: left;'>Delivery</td>
                            <td style='padding: 1rem; text-align: right;'>$ " . number_format($summarys[0]['shipping_fee'], 2) . "</td>
                        </tr>
                        <tr>
                            <td style='padding: 1rem; text-align: left;'>Tax</td>
                            <td style='padding: 1rem; text-align: right;'>$ " . number_format(5, 2) . "</td>
                        </tr>
                        <tr style='font-weight: bold;'>
                            <td style='padding: 1rem; text-align: left;'>Order Total</td>
                            <td style='padding: 1rem; text-align: right;'>$ " . number_format($ordertotal, 2) . "</td>
                        </tr>
                    </table>
                    <div style='margin-top: 1.5rem; text-align: center;'>
                        <p style='font-size: 1rem;'>Your order is being processed and will be delivered soon.</p>
                        <p style='font-size: 0.7rem;'>NicheNest &copy; | All Rights Reserved</p>
                    </div>
                </div>
            </body>
            </html>";



        // Send the email with PHPMailer
        $email = $_SESSION['user_email'];
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'berylkoram378@gmail.com';
            $mail->Password = 'ezfp lcdy khas roav';
            $mail->Username = 'berylkoram378@gmail.com';
            $mail->Password = 'ezfp lcdy khas roav';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('berylkoram378@gmail.com', 'NicheNest Invoice');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Your Invoice from NicheNest';
            $mail->Body = $invoicecontent;

            $mail->send();
            echo "Invoice sent successfully!";
        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            echo "Failed to send the invoice.";
        }
    } else {
        echo "Payment recording failed.";
        exit();
    }

    header("Location:../view/personalshopping.php");
    exit();
} else {
    echo "Invalid request.";
    exit();
}
?>
