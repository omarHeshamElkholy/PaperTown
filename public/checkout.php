<?php  require_once("../resources/config.php");    ?>
<?php  require_once("cart.php");?>

<?php include(TEMPLATE_FRONT . DS . "HEADER.PHP") ?>


    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">
<h4 class="text-center"> <?php display_message();  ?> </h4>
      <h1>Checkout</h1>

 <!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"> 
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="merchant@papertown.com">
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="currency_code" value="USD">
-->
<form class="form-horizontal" action="thankyou.php">

    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
          </tr>
        </thead>
        <tbody>
        <?php
        cart(); 
        ?>
        </tbody>
    </table>
    <!-- <input type="image" name="upload"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online"> -->
    <label for="fname">Full name:</label><br>
  <input class="form-control" type="text" id="fname" name="name"><br>
  <label for="email">Email:</label><br>
  <input class="form-control" type="email" id="mail" name="mail">
</br>
<label for="Phone Number">Phone Number:</label><br>
  <input class="form-control" type="text" id="phone" name="phone">
</br>
  <label for="Address">Address:</label><br>
  <input class="form-control" type="text" id="address" name="address">
 </br>
 <input type="hidden" id="total" name="total" value="<?php  
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";
?>" readonly>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">
<?php  
echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";
?>
</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">&#163;
<?php  
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";
?>


</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->
<input type="submit" value="Payment on delivery" class="btn btn-success form-control">

</form>
<!-- Checkout form -->
<!-- <?php include(TEMPLATE_FRONT . DS . "Checkoutform.PHP") ?> -->

</form>

 </div><!--Main Content-->


           <hr>
           <?php include(TEMPLATE_FRONT . DS . "FOOTER.PHP") ?>
