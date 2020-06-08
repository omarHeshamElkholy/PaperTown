<?php  require_once("../resources/config.php");    ?>
<?php  
if (isset($_GET['add'])){

  $query = query("SELECT * FROM products WHERE Product_id=" . escape_string($_GET['add']). "");
confirm($query);

While ($row = fetch_array($query)){
if ($row ['product_quantity'] != $_SESSION['product_' . $_GET['add']])  {

  $_SESSION['product_' . $_GET['add']]+=1;
  redirect("checkout.php");
} else {
  set_message("Sorry, We only have" ." " . $row['product_quantity'] . " " . "available");
  redirect("checkout.php");
}

}

//  $_SESSION['product_' . $_GET['add']] +=1;
 // redirect("index.php");
}

if(isset($_GET['remove'])){
  $_SESSION['product_' . $_GET['remove']]--;
  if($_SESSION['product_' . $_GET['add']] <1) {
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("checkout.php");
  }
  else {
    redirect("checkout.php");

  }


}
if(isset($_GET['delete'])){
  $_SESSION['product_' . $_GET['delete']] = "0";
  unset($_SESSION['item_total']);
  unset($_SESSION['item_quantity']);
redirect("checkout.php");

}

function cart() {
$item_quantity = 0;
$total = 0;
$item_name = 1;
$item_number = 1;
$amount = 1;
$quantity = 1;

foreach ($_SESSION as $name => $value) {
  if($value > 0) {
    if (substr($name, 0, 8) == "product_" ){


      $length = strlen($name) - 8;

$id = substr($name, 8, $length);

      $query = query("SELECT * FROM products WHERE Product_id = " . escape_string($id) . " ");
      confirm($query);
      while($row = fetch_array($query)) {

$sub = $row['Product_price']*$value;
$item_quantity +=$value;

      $product = <<<DELIMETER
      <tr>
      <td>{$row['Product_title']}</td>
      <td>&#163;{$row['Product_price']}</td>
      <td>{$value}</td>
      <td>&#163;{$sub}</td>
      <td> 
      <a href="cart.php?remove={$row['Product_id']}" class="btn btn-warning"><span class='glyphicon glyphicon-minus'></span><a>
      
      <a href="cart.php?add={$row['Product_id']}" class="btn btn-success"><span class='glyphicon glyphicon-plus'></span></a>
      <a href="cart.php?delete={$row['Product_id']}" class="btn btn-danger"><span class='glyphicon glyphicon-remove'></a></td>
      </tr>
      <input type="hidden" name="item_name_{$item_name}" value="{$row['Product_title']}">
      <input type="hidden" name="item_number_{$item_number}" value="{$row['Product_id']}">
      <input type="hidden" name="amount_{$amount}" value="{$row['Product_price']}">
      <input type="hidden" name="quantity_{$quantity}" value="{$value}">
      
      DELIMETER;
      
      echo $product;

      $item_name++;
      $item_number++;
      $amount++;
      $quantity++;
     $_SESSION['item_total'] = $total += $sub;
     $_SESSION['item_quantity'] = $item_quantity;
   



      
      }
  }
  


        }

    }

  }




?>