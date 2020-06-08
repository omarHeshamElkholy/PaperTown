<?php  require_once("../resources/config.php");    ?>
<?php include(TEMPLATE_FRONT . DS . "HEADER.PHP") ?>

<?php 

if(isset($_GET['item_name_1'])) {
    $item1 =  $_GET['item_name_1'];
    $amount1 =  $_GET['amount_1'];
    $quantity1 =  $_GET['quantity_1'];
    $fname =  $_GET['name'];
    $mail =  $_GET['mail'];
    $phone =  $_GET['phone'];
    $address =  $_GET['address'];
    $total =  $_GET['total'];
    $query = query("INSERT INTO orders (cust_name, cust_email, cust_phone, cust_address, product, quantity, order_total) VALUES('{$fname}', '{$mail}','{$phone}','{$address}','{$item1}','{$quantity1}','{$total}')");
confirm($query);
}
else {
  redirect("index.php");
}
if(isset($_GET['item_name_2'])) {
  $item2 =  $_GET['item_name_2'];
  $quantity2 =  $_GET['quantity_2'];
  $query = query("INSERT INTO orders (cust_name, cust_email, cust_phone, cust_address, product, quantity, order_total) VALUES('{$fname}', '{$mail}','{$phone}','{$address}','{$item2}','{$quantity2}','{$total}')");
  confirm($query);}
if(isset($_GET['item_name_3'])) {
  $item3 =  $_GET['item_name_3'];
  $quantity3 =  $_GET['quantity_3'];
  $query = query("INSERT INTO orders (cust_name, cust_email, cust_phone, cust_address, product, quantity, order_total) VALUES('{$fname}', '{$mail}','{$phone}','{$address}','{$item3}','{$quantity3}','{$total}')");
  confirm($query);}
if(isset($_GET['item_name_4'])) {
  $item4 =  $_GET['item_name_4'];
  $quantity4 =  $_GET['quantity_4'];
  $query = query("INSERT INTO orders (cust_name, cust_email, cust_phone, cust_address, product, quantity, order_total) VALUES('{$fname}', '{$mail}','{$phone}','{$address}','{$item4}','{$quantity4}','{$total}')");
  confirm($query);}
if(isset($_GET['item_name_5'])) {
  $item5 =  $_GET['item_name_5'];
  $quantity5 =  $_GET['quantity_5'];
  $query = query("INSERT INTO orders (cust_name, cust_email, cust_phone, cust_address, product, quantity, order_total) VALUES('{$fname}', '{$mail}','{$phone}','{$address}','{$item5}','{$quantity5}','{$total}')");
  confirm($query);}

session_destroy();
 ?>




<div class="container">



<h1 class="text-center">Thank you for confirming your order </br>
Your total is <?php echo $total ?> EGP </br>
We will be contacting you shortly to confirm your order <?php echo $fname ?>

</h1>

</div>




    <!-- /.container -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>