<?php

//Helper Functions 
function set_message($msg){
if(!empty($msg)){
  $_SESSION['message']= $msg;

}
else {
$msg = "";
}
}
function display_message(){
  if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']  );
  }
}


function redirect($location) {
  header("Location: $location");
}
function query($sql){
  global $connection;
  return mysqli_query($connection, $sql);
}

function confirm($result){
  global $connection;
if(!$result){
  die("QUERY FAILED" . mysqli_error($connection));

}

}

function escape_string ($string){
  global $connection;
  return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result) {
  return mysqli_fetch_array($result);

}

//Get Products
function get_product() {

  $query = query("SELECT * FROM products");
  confirm($query);

  while ($row = fetch_array($query)) {
    
    $product = <<<DELIMETER
    <div class="col-sm-4 col-lg-4 col-md-4 ">
                        <div class="thumbnail prodxo">
                            <a href="item.php?id={$row['Product_id']}"><img src={$row['Product_image']} alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&pound;{$row['Product_price']}</h4>
                                <h4><a href="item.php?id={$row['Product_id']}">{$row['Product_title']}</a>
                                </h4>
                                <p class="descxo">{$row['short_desc']}</p>
                            </div>
                            <a href="cart.php?add={$row['Product_id']}" class="btn btn-primary">Add to Book Bag</a>
                          </div>
                    </div>           
    DELIMETER;
    echo $product;
  }


}
function get_categories(){
  $query =query("SELECT * FROM Categories");
                confirm($query);
                while($row = mysqli_fetch_array($query)) {
                  $categories_links = <<<DELIMETER
                  <a href='category.php?id={$row['Cat_id']}' class='list-group-item linksxo'>{$row['Cat_Title']}</a>
                  DELIMETER;
                echo $categories_links;
                           
                }
}

function get_product_in_cat_page() {

  $query = query(" SELECT * FROM products WHERE Product_category_id = " . escape_string($_GET['id']) . " ");
  confirm($query);

  while ($row = fetch_array($query)) {
    
    $product = <<<DELIMETER
    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail prodxo">
                            <a href="item.php?id={$row['Product_id']}"><img src={$row['Product_image']} alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">&pound;{$row['Product_price']}</h4>
                                <h4><a href="item.php?id={$row['Product_id']}">{$row['Product_title']}</a>
                                </h4>
                                <p class="descxo">{$row['short_desc']}</p>
                            </div>
                            <a href="item.php" class="btn btn-primary">Buy Now</a>
                          </div>
                    </div>           
    DELIMETER;
    echo $product;
  }
}

function login_user(){
if(isset($_POST['submit'])){
 $username = escape_string($_POST['username']);
 $password = escape_string($_POST['password']);

 $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
confirm($query);
if(mysqli_num_rows($query) == 0) {
  
  set_message("Your Email or Password are incorrect");
  redirect("login.php");
}
else {
  $_SESSION['username'] = $username;
redirect("admin");

}
}

}

function sell_book() {
  if(isset($_POST['submit'])){

$to     =                "papertownapp5@gmail.com";
$name   =                $_POST['name'];
$Sellermail  =           $_POST['email'];
$Phone  =                $_POST['phone'];
$bookName  =             $_POST['bookSold'];
$goodreadsLink  =        $_POST['link'];
$condition  =            $_POST['Condition'];
$comments  =             $_POST['Comments'];

$emailBody = 
              "Hello, my name is $name.
             Email : $Sellermail. Phone number: $Phone. 
             Selling $bookName.
             with goodreads link :$goodreadsLink.
             the condition of the book: $condition.
             any comments: $comments.";

$headers = "From:{$name} /n {$Sellermail} /n {$Phone}";


$result = mail($to, $bookName, $emailBody, $headers);
if (!$result) {
  redirect("sellBook.php");
  set_message("Sorry an error has accured");

} else {
  redirect("sellBook.php");
  set_message("Your book has been submited we will contact you shortly");

}







}
}





function Request_book() {
  if(isset($_POST['submit'])){

$to     =                "papertownapp5@gmail.com";
$name   =                $_POST['name'];
$Sellermail  =           $_POST['email'];
$Phone  =                $_POST['phone'];
$bookName  =             $_POST['bookWanted'];
$goodreadsLink  =        $_POST['link'];
$comments  =             $_POST['Comments'];

$emailBody = 
            "Hello,
             my name is $name.
             Email : $Sellermail. Phone number: $Phone. Requesting the book $bookName. 
             with goodreads link :$goodreadsLink.
             any comments: $comments.";

$headers = "From:{$name} /n {$Sellermail} /n {$Phone}";


$result = mail($to, $bookName, $emailBody, $headers);
if (!$result) {
  redirect("Request.php");
  set_message("Sorry an error has accured");

} else {
  redirect("Request.php");
  set_message("Your request has been submited we will contact you shortly");

}
  }}


// backend functions

function display_orders(){

  $query = query("SELECT * FROM orders");
  confirm($query);

  While($row = fetch_array($query)){
    $orders = <<<DELIMETER

    <tr>
    <td>{$row['cust_name']}</td>
    <td>{$row['cust_email']}</td>
    <td>{$row['cust_phone']}</td>
    <td>{$row['cust_address']}</td>
    <td>{$row['order_id']}</td>
    <td>{$row['product']}</td>
    <td>{$row['quantity']}</td>
    <td>{$row['order_total']}</td>
</tr>

DELIMETER;
echo $orders;
  }
}






?>