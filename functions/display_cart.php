<?php
include_once("../classes/cart_class.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


function display_cart()
{
    $customerid = $_SESSION['user_id'];
    $displaycart = new cart_class();
    $cartitems = $displaycart->view_cart($customerid);
    $totalprice = 0;

    if (gettype($cartitems) != "NULL")
    {
        foreach ($cartitems as $cartitem)
        {
            $pid = $cartitem['product_id'];
            $pdetails =  $displaycart->get_cart_product($pid);
            $ptitle = $pdetails['item_name'];
            $price = $pdetails['Price'];
            $subtotal =$price * $cartitem['qty'];
            $totalprice += $subtotal;

            echo 
            "<div class='cart-item'>
                    <img src='".$pdetails['item_img']."' alt='item image' class='item-image'>
                    <div class='item-details'>
                        <h4>".$ptitle."</h4>
                    </div>
                    <div class='item-price'>$".number_format($price, 2)."</div>
                    <div class='item-quantity'>
                        <a href='../actions/decrease_cart_action.php?key=".$pid."'
                            <button class='quantity-btn decreaseqty'>-</button>
                        </a>
                        <input type='number' value='".$cartitem['qty']."' min='1' name='qty' class='quantity'>
                        <a href='../actions/increase_cart_action.php?key=".$pid."'
                            <button class='quantity-btn increaseqty'>+</button>
                        </a>
                        </div>
                    <div class='item-total'>$".number_format($subtotal,2)."</div>
                    <span class='material-symbols-outlined'>delete</span>
            </div>";
        }
    }
}

function display_cart_total()
{
    $customerid = $_SESSION['user_id'];
    $displaycart = new cart_class();
    $cartitems = $displaycart->view_cart($customerid);
    $totalprice = 0;

    if (gettype($cartitems) != "NULL")
    {
        foreach ($cartitems as $cartitem)
        {
            $pid = $cartitem['product_id'];
            $pdetails =  $displaycart->get_cart_product($pid);
            $price = $pdetails['Price'];
            $subtotal = $price * $cartitem['qty'];
            $totalprice += $subtotal;
        }
        $delivery = $displaycart->get_cart_delivery($customerid);

        $deliveryfee = $delivery ? $delivery['fee'] : 0;

        $deliveryfee = $delivery['fee'];
        $cart_total = $totalprice + $deliveryfee;
        echo "<form action='../actions/add_order_action.php' method='post' name='order-form' class='cart-total'>
                    <h3>Cart Total</h3>
                    <p  id='subtotal'>Cart Subtotal: <span>$".number_format($totalprice,2)."</span></p>
                    <p name='deliveryfee'>Delivery<span>$".number_format($deliveryfee,2)."</span></p>
                    <h4 name='totalamount'>Total: <span>$".number_format($cart_total,2)."</span></h4>
                    <input type='hidden' name='subtotal' value='".$totalprice."'>
                    <input type='hidden' name='deliveryfee' value='".$deliveryfee."'>
                    <button type='submit' class='button checkout'>Checkout</button>
             </form>";
    }
    else
    {
        echo "<form> </form>";
    }
}

?>