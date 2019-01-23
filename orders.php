<?php
require 'header-Log.php';
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

    <li><a  href="contactus.php">Contact Us </a></li> &nbsp;

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
<!--DISPLAY ALL ORDERS
1. Take user_id and extract ALL transaction_id's pertaining to user logged in from ORDERS table
2. Using transaction_id extract ALL records with those transaction id's.
3. Using product id from records table EXTRACT product name from products table.
-->
<?php
//query 1
$query_user_transactions = "SELECT transaction_id FROM orders WHERE fk_user_id = '$user_id' ";
$run_query1 = mysqli_query($mysqli, $query_user_transactions);
$checkquery1 = mysqli_num_rows($run_query1);
$transaction_ID_array = array();
$product_ID_array =array();
$counter = 1;
if ($checkquery1 > 0) {
    while ($row = mysqli_fetch_assoc($run_query1)) {
        $transaction_ID_array [] = $row['transaction_id'];
    }
    echo "<div class = 'absolute'><table border = '1' width ='80%'><thead></thead><div class='result-box-title'><tr><td><h2>Found: ".$checkquery1." orders<h2></tr></td>";
    
    foreach ($transaction_ID_array as $value) {
        echo "<tr><td>___________________________________________________________________________________________________________________________________";
        echo "</tr></td><tr><td height = '40'></tr></td><div class='result-box'><tr><td>Order: " .$counter;
        $counter++;
        //query2
        $query_records_matchTID = "SELECT fk_transaction_id, fk_product_id, product_quantity, sale_price FROM records WHERE fk_transaction_id = '$value' ";
        $run_query2 = mysqli_query($mysqli, $query_records_matchTID);

        while ($row2 = mysqli_fetch_assoc($run_query2)) {
            $product_ID_array [] = $row2['fk_product_id']; //Storing product id values in array

            foreach ($product_ID_array as $value2) {
                //query3
                $grab_product_names = "SELECT name FROM product WHERE product_id = '$value2' ";
                $run_query3 = mysqli_query($mysqli, $grab_product_names);

                while ($row3 = mysqli_fetch_assoc($run_query3)) {
                    //query4
                    $newquery = "SELECT `delivery_address`, `date_time`, `total_cost`, `subtotal`, `taxed_amount` FROM `orders` WHERE transaction_id = '$value' ";
                    $run_query4 = mysqli_query($mysqli, $newquery);

                    while ($row4 = mysqli_fetch_assoc($run_query4)) {
                        echo "</tr></td><tr><td height = '10'></tr></td><tr><td>Transaction ID: ".$value;
                        echo "</tr></td><tr><td>Date_Time: ".$row4['date_time'];
                        echo "</tr></td><tr><td>Delivery Address: ".$row4['delivery_address'];
                        echo "</tr></td><tr><td>Product Name: ".$row3['name'];
                        echo "</tr></td><tr><td>Qty: ".$row2['product_quantity'];
                        echo "</tr></td><tr><td>Price: $".$row2['sale_price'];
                        echo "</tr></td><tr><td>Subtotal: $".$row4['subtotal'];
                        echo "</tr></td><tr><td>Taxed Amt: $".$row4['taxed_amount'];
                        echo "</tr></td><tr><td>Total: $".$row4['total_cost']."</tr></td>";
                        $product_ID_array = array();
                        echo "</div>";
                    }
                }
            }
        }
    }
    echo "</table>";
} else {
    echo "No orders founds.";
}
 ?>

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
<?php /*
$delivervalue = $row['delivery_address'];
$datetimeValue= $row['date_time'];
$total_costValue= $row['total_cost'];
$subtotalValue = $row['subtotal'];
$taxed_amountValue= $row['taxed_amount'];
*/ ?>
