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
    $customer_id = $_SESSION['user_id'] ?? null;
    $totalamount = $_POST['amount'] ?? null;
    $orderid = $_POST['orderid'] ?? null;

    if (!$customer_id || !$totalamount || !$orderid) {
        echo "Missing required parameters.";
        exit();
    }

    // Sanitize inputs
    $customer_id = htmlspecialchars($customer_id, ENT_QUOTES, 'UTF-8');
    $totalamount = htmlspecialchars($totalamount, ENT_QUOTES, 'UTF-8');
    $orderid = htmlspecialchars($orderid, ENT_QUOTES, 'UTF-8');

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
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

                    :root 
                    {
                        --color-linear: linear-gradient(var(--color-brand-4), var(--color-brand-3), var(--color-brand-4), var(--color-brand-3));
                        --color-text: #333 !important;
                        --color-text-1: #ffffff;
                        --color-brand-2: #4b79ff;
                        --color-brand-3: #6A5ACD;
                        --color-brand-4: #282158;
                        --box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1),
                                    0px 1px 3px rgba(0, 0, 0, 0.08);
                        --box-shadow-1: 0px 4px 10px rgba(0, 0, 0, 0.3);
                        --border-radius: 20px;
                        --border-radius-1: 10px;
                        --padding-small: 1rem;
                        --padding-medium: 1.5rem;
                        --padding-large: 2rem;
                        --logo-fontsize: 3rem;
                        --fontsize-tiny: 0.8rem;
                        --fontsize-regular: 1rem;
                        --fontsize-smedium: 1.2rem;
                        --fontsize-large: 2rem;
                    }

                    * 
                    {
                        font-family: 'Poppins', sans-serif;
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    body {
                        grid-area: main;
                        width: 100%;
                        height: 100%;
                        background-color: #f9f9fc; 
                        padding: var(--padding-large);
                        display: flex;
                        flex-direction: column;
                        justify-content: flex-start;
                        align-items: center;
                        overflow-y: auto; 
                    }

                    .invoice_header
                    {
                        width: 100%;
                        color:var(--color-text-1);
                        background-color: var(--color-brand-3);
                        padding: var(--padding-medium);
                        border-radius: var(--border-radius-1);
                    }

                    .invoice_header h3
                    {
                        font-family: 'Great Vibes', cursive;
                        font-size: var(--logo-fontsize);
                    }

                    .invoice_container{
                        border: 1px solid #ddd; 
                        padding: var(--padding-small); 
                    }

                    .invoice_main{
                        padding: var(--padding-medium);
                    }

                    /* Styling for order-info section */
                    .order-info {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: var(--padding-medium);
                        padding: var(--padding-small);
                        background-color: var(--color-brand-3);
                        border-radius: var(--border-radius-1);
                        color: var(--color-text-1); /* White text for contrast */
                        font-size: var(--fontsize-regular);
                    }

                    .order-info span {
                        font-weight: 600; 
                    }

                    .order-number {
                        background-color: transparent;
                        border: none;
                        color: var(--color-text-1);
                        font-weight: 600;
                        font-size: var(--fontsize-regular);
                        text-align: right;
                    }

                    /* Styling for order-items section */
                    .order-items {
                        margin-bottom: var(--padding-medium);
                    }

                    .order-item {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        padding: var(--padding-small);
                        margin-bottom: var(--padding-small);
                        border-bottom: 1px solid #ddd; 
                    }

                    .item-details {
                        display: flex;
                        align-items: center;
                    }

                    .item-details img {
                        width: 50px;
                        height: 50px;
                        border-radius: var(--border-radius-1); /* Rounded corners for images */
                        margin-right: var(--padding-small);
                    }

                    .item-details p {
                        margin: 0;
                        font-weight: 600;
                        font-size: var(--fontsize-regular);
                        color: var(--color-text);
                    }

                    .item-quantity, .item-price {
                        font-size: var(--fontsize-regular);
                        font-weight: 600;
                        color: var(--color-text);
                    }

                    /* Styling for cost-breakdown section */
                    .cost-breakdown {
                        padding: var(--padding-small);
                        background-color: #f2f4ff; /* Slightly tinted background for contrast */
                        border-radius: var(--border-radius-1);
                        margin-bottom: var(--padding-medium);
                    }

                    .cost-item {
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: var(--padding-small);
                        font-size: var(--fontsize-regular);
                        font-weight: 500;
                        color: var(--color-text);
                    }
                </style>
            </head>
            <body>
                <div class='invoice_container'>
                    <div class='invoice_header'>
                        <h3>NicheNest</h3>
                        <p>Everything you need in one place</p>
                    </div>
                    <div class='invoice_main'>
                        <p>Hello,</p>
                        <p>Thank you for your order. Your payment has been processed, and you can find your invoice below:</p>
                    </div>
                    <div class='order-summary-container'>
                        <div class='order-info'>
                            <span>Order number</span>
                            <input type='text' value='" .$summarys[0]['invoice_no']. "' readonly class='order-number'>
                        </div>
                        <div class='order-items'>";

        $total = 0;
        foreach ($summarys as $summary) {
            $itemtotal = $summary['quantity'] * $summary['unit_price'];
            $total += $itemtotal;

            $invoicecontent .= "
                <div class='order-item'>
                    <div class='item-details'>
                        <p id='item'>" .$summary['item_name']. "</p>
                    </div>
                    <div class='item-quantity'>x" .$summary['quantity']. "</div>
                    <div class='item-price'>$ " . number_format($itemtotal, 2) . "</div>
                </div>";
        }

        $ordertotal = ceil($total + $summarys[0]['shipping_fee']);
        $invoicecontent .= "
                        </div>
                        <div class='cost-breakdown'>
                            <div class='cost-item'>
                                <span>Subtotal</span>
                                <span id='subtotal'>$ " . number_format($total, 2) . "</span>
                            </div>
                            <div class='cost-item'>
                                <span>Delivery</span>
                                <span id='deliveryfee'>$ " . number_format($summarys[0]['shipping_fee'], 2) . "</span>
                            </div>
                            <div class='cost-item'>
                                <span><strong>Order Total</strong></span>
                                <span id='orderfee'><strong>$ " . number_format($ordertotal, 2) . "</strong></span>
                            </div>
                        </div>
                         <div>
                            <p style='text-align: text; font-size: 1rem; padding: 1rem'>Your order is being processed and will be delivered soon</p>
                            <p style='text-align: center; font-size: 0.7rem'>NicheNest &copy; | All Rights Reserved</p>
                        </div>
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
            $mail->Username = 'berylkoram378@gmail.com'; // Replace with your email
            $mail->Password = 'ezfp lcdy khas roav'; // Replace with app password
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
