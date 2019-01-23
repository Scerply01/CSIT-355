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

  <li style = "float:right"><a class="active" href="cart.php"> Cart</a></li>&nbsp;
</ul>
 <div class= "carthead">
  <?php
  echo "<h1>Shopping Cart</h1>";
  if ($_SERVER['REQUEST_METHOD']=='POST') {
      if (isset($_POST['quantity'])) {
          $_SESSION[`savecost`] = $_POST['savecost'];
          $_SESSION['quantity'] = $_POST['quantity'];
          $_SESSION['id'] = $_POST['id'];

          $savecost = mysqli_real_escape_string($mysqli, $_POST['savecost']);
          $id = mysqli_real_escape_string($mysqli, $_POST['id']);
          $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);

          $insert = "INSERT INTO cart (fk_user_id, fk_product_id, quantity,  product_cost)"."VALUES ('$user_id', $id, '$quantity', '$savecost')";
          $result = mysqli_query($mysqli, $insert);
      }
  }

  //THIS WILL DISPLAY THE USER CART
  $createcart= "SELECT product.product_id, product.name, product.cost, cart.quantity FROM product, cart
  WHERE product.product_id=cart.fk_product_id AND cart.fk_user_id='$user_id' ";

  $result = mysqli_query($mysqli, $createcart);
  $queryResult = mysqli_num_rows($result);

  if ($queryResult >0) {
      echo "_____________________________________________________________________________________";
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<h4>".$row['name'].
        " | Cost: $".$row['cost'].
        " | Qty: ".$row['quantity']."</h4>";
          echo "_____________________________________________________________________________________";
      }
      echo '<form action = "processed.php" method="POST">';
      echo '</br> <button type = "submit" name = "placeorder" > Place Order</button>';
      echo '<input type = "address" name="Daddress" placeholder="Street address, City, State"></form>';
  } else {
      echo "Your shopping cart is empty.";
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
 </div>
</body>
</html>
