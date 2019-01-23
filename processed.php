<?php
require 'header-Log.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['placeorder'])) {
        $Ddelivery = mysqli_real_escape_string($mysqli, $_POST['Daddress']);
        $update_subtotals = "UPDATE cart SET `row_subtotal`=`quantity`*`product_cost`";
        mysqli_query($mysqli, $update_subtotals);

        $load_subtotal= "SELECT SUM(`row_subtotal`) FROM cart WHERE fk_user_id='$user_id' ";
        $result = mysqli_query($mysqli, $load_subtotal);
        while ($row = mysqli_fetch_array($result)) {
            $subtotal = $row['0']; //subtotal Atttribute
        }
        $current_date = date("Y-m-d H:i:s"); //date Atttribute
        $tax = 0.07;
        $taxed_amount = $subtotal * $tax; // taxed_amount Atttribute
        $total_cost = $subtotal+ $taxed_amount; //total_cost Atttribute
        $deliver_address = $Ddelivery; //shipping_address Attribute
    }
    //Create an order in table
    $insert_into_orders = "INSERT INTO orders(delivery_address, date_time, total_cost, subtotal, fk_user_id, taxed_amount)".
    "VALUES('$deliver_address', '$current_date', '$total_cost', '$subtotal', '$user_id', '$taxed_amount')";
    $runquery = mysqli_query($mysqli, $insert_into_orders);

    //Query cart and pick out product_id, quantity, cost
    $cart_info = "SELECT cart.fk_product_id, cart.quantity, cart.product_cost FROM cart WHERE cart.fk_user_id='$user_id' ";
    $orders_cart = mysqli_query($mysqli, $cart_info);
    //Query last transaction_id by current $user_id
    $last_transaction_id = "SELECT orders.transaction_id FROM orders WHERE orders.fk_user_id = '$user_id' ORDER BY orders.date_time DESC LIMIT 1 ";
    $orders_result = mysqli_query($mysqli, $last_transaction_id);

    while ($row_orders = mysqli_fetch_array($orders_result)) {
        $user_last_transaction_id = $row_orders['0'];
    }

    while ($row_cart = mysqli_fetch_assoc($orders_cart)) {
        $cart_product_id = $row_cart['fk_product_id'];
        $cart_quantity = $row_cart['quantity'];
        $cart_product_cost = $row_cart['product_cost'];

        $insert_into_records = "INSERT INTO records (fk_transaction_id, fk_product_id, product_quantity, sale_price)"."VALUES('$user_last_transaction_id', '$cart_product_id', '$cart_quantity', '$cart_product_cost')";
        mysqli_query($mysqli, $insert_into_records);
    }

    //--Clear Cart
    $cleancart = "DELETE FROM cart WHERE fk_user_id = $user_id";
    $run_clearcart = mysqli_query($mysqli, $cleancart);
    echo "<h1>Your order has been processed.</h1>";
} else {
    echo "Your order will not be submitted again";
}
?>
<ul>
  <li><a href="Home.php"> Home</a></li> &nbsp;
 <!--__________________Drop down button in navbar_____________-->
  <div class="dropdown">
    <button class="dropbtn" onclick="myFunction()">Product Category</button>
    <div class="dropdown-content" id="myDropdown">
      <a href="bakeware.php">Bakeware</a>
      <a href="cookut.php">Cooking Utensils</a>
      <a href="cutlery.php">Cutlery</a>
      <a href="pnp.php">Pots & Pans</a>
      <a href="smallapp.php">Small Appliances</a>
    </div>
  </div>

  <div class="dropdown2">
    <button class="dropbtn2" onclick="myFunction2()">Views</button>
    <div class="dropdown-content2" id="myDropdown2">
      <a href="employeeView.php">Employee</a>
      <a href="#">Admin</a>
      <a href="#">Manager</a>
      <a href="#">???</a>
    </div>
  </div>

  <div class="dropdown3">
    <button class="dropbtn3"onclick="myFunction3()" >
    <?php echo "<div class='shrink1'>Hello! " .$first_name.',</div>';?>
    <div class='shrink2'>My Account </div></button>
    <div class="dropdown-content3" id="myDropdown3">
      <a href="orders.php">Orders</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>
  <!--_______________________Search Bar____________________-->
  <div class="searchBar">
    <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search here">
        <button type="submit" name="submit-search"><i class="fas fa-search"></i></button>
    </form>
  </div>

  <li style = "float:right"><a href="cart.php"> Cart</a></li>&nbsp;
</ul>
<h1></h1>
<script>
 /* When the user clicks on the button, toggle between hiding and showing the dropdown content */
 function myFunction() {
   document.getElementById("myDropdown").classList.toggle("showA");
 }
 function myFunction2() {
   document.getElementById("myDropdown2").classList.toggle("showB");
 }
 function myFunction3() {
   document.getElementById("myDropdown3").classList.toggle("showC");
 }
</script>
</body>
</html>
<?php

/*--Adjust Inventory
$checkInventory = "SELECT inventory FROM product WHERE product_id = '$id' ";
$run_check = mysqli_query($mysqli, $checkInventory);
/*$inventoryArray = array();
while ($row2 = mysqli_fetch_assoc($run_check)){}
while ($row2 = mysqli_fetch_array($run_check)) {
    $inventoryArray = $row2['inventory'];
    print_r($inventoryArray);
}
foreach ($inventoryArray as $value) {
if ($run_check > $quantity) {
    $updateInventory = "UPDATE product SET `inventory` = `inventory` -  $quantity WHERE product_id = $id";
    mysqli_query($mysqli, $updateInventory);
} else {
    echo "OUT OF STOCK, remaining in stock:".$run_check;
}*/
 ?>
