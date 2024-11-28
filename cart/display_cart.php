<?php
include("../classes/cart_class.php");

function display_cart($customerid)
{
    $displaycart = new cart_class();
    $cartitems = $displaycart->view_cart($customerid);
    $totalprice = 0;
    
    if (gettype($cartitems) != "NULL")
    {
        foreach ($cartitems as $cartitem)
        {
            $prodid = $cartitem['p_id'];
            $proddetails =  $displaycart->get_cart_product($prodid);
            $prodtitle = $proddetails['product_title'];
            $prodprice = $proddetails['product_price'];
            $subtotal = $prodprice * $cartitem['qty'];
            $totalprice += $subtotal;
            echo
                "<div class='itemcontainer'>
                    <div class='divone'>
                        <input type='checkbox' class='selectors'>
                        <h3>".$prodtitle."</h3>
                    </div>
                    <div class='divtwo'>
                        <p>Unit price: &dollar;".$prodprice."</p>
                        <h4 id='popupqty'>
                            <a href='../actions/decrease_cart_action.php?key=".$prodid."'>
                                <span class='material-symbols-outlined decreaseqty'>chevron_left</span>
                            </a> 
                            <span class='quantity'>".$cartitem['qty']."</span> 
                            <a href='../actions/increase_cart_action.php?key=".$prodid."'>
                                <span class='material-symbols-outlined increaseqty'>chevron_right</span> 
                            </a>
                        </h4>
                        <p>Sub-total: &dollar;".$subtotal."</p>
                        <a href='../actions/delete_cart_action.php?key=".$prodid."'>
                            <span id='delbtn' class='material-symbols-outlined'>delete</span> 
                        </a>
                    </div>
                </div>";
        }
        echo
            "</div> 
            <div class='summarycontainer'>
                <div class='summary'>
                    <div class='summarycontent'>
                        <h5> Total Price </h5>
                        <h6> &dollar;".$totalprice."</h6>
                    </div>
                    <button type='submit'> Proceed to Checkout </button>
                </div>
            </div>
            <a id='backbtn' href='../view/products_view.php'>Back</a>";
    }
}

?>