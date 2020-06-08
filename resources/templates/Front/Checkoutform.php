<form class="form-horizontal" action="">
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<label for="fname">Full name:</label><br>
  <input class="form-control" type="text" id="fname" name="name"><br>
  <label for="email">Email:</label><br>
  <input class="form-control" type="email" id="mail" name="mail">
</br>
<label for="Phone Number">Phone Number:</label><br>
  <input class="form-control" type="email" id="mail" name="phone">
</br>
  <label for="Address">Address:</label><br>
  <input class="form-control" type="text" id="address" name="address">
</br>
</br>
<div class="text-center">
  <input type="hidden" id="total" name="total" value="<?php  
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";
?>" readonly>
  <input type="submit" value="Payment on delivery" class="btn btn-success form-control">
  </div>
</form>