<?php
include_once("../classes/order_class.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function display_ordersummary($id)
{
    $displaysummary = new order_class();
    $summarys = $displaysummary->get_orderdetails($id);
    echo "<div class='order-summary-container'>
            <!-- Order Info -->
            <div class='order-info'>
                <span>Order number</span>
                <input type='text' value='".$summarys[0]['invoice_no']."' readonly class='order-number'>
            </div>
            <!-- Order Items -->
            <div class='order-items'>";
    $total = 0;
    foreach ($summarys as $summary)
    {
        $itemtotal = $summary['quantity'] * $summary['unit_price'];
        $total+= $itemtotal;
        echo "<div class='order-item'>
                    <div class='item-details'>
                        <img src='".$summary['item_img']."' alt='item image' id='item_image'>
                        <p id='item'>".$summary['item_name']."</p>
                    </div>
                    <div class='item-quantity'>x".$summary['quantity']."</div>
                    <div class='item-price'>$ ".$itemtotal."</div>
                </div>";
    }
    $ordertotal = (int)ceil($total + $summary['shipping_fee']);
    echo "</div>
            <!-- Cost Breakdown -->
            <div class='cost-breakdown'>
                <div class='cost-item'>
                    <span>Subtotal</span>
                    <span id='subtotal'>$ ".$total."</span>
                </div>
                <div class='cost-item'>
                    <span>Delivery</span>
                    <span id='deliveryfee'>$ ".$summary['shipping_fee']."</span>
                </div>
                <div class='cost-item'>
                    <span>Tax</span>
                    <span id='taxfee'>$ 5.00</span>
                </div>
                <div class='cost-item'>
                    <span><strong>Order Total</strong></span>
                    <span id='orderfee'><strong> $ ".number_format($ordertotal,2)."</strong></span>
                </div>
            </div>
            <form id='itempaymentform'>
                <label for='email'>Email Address:</label>
                <input type='text' name='email' id='email' required>
                <input type='hidden' name='orderid' id='orderid' value='".$summary['order_id']."'>
                <input type='hidden' name='amount' id='amount' value='".$ordertotal."'>
                <button type='submit' name='submit' onsubmit='payWithPaystack()'>Pay</button>
            </form>
        </div>";

}

?>