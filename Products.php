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
<div id="my_table" class="left">
  <table>
    <thead></thead>
    <tbody>
      <tr><td rowspan="8"><div class="container">
        <?php
        $id = $_GET['id'];
        $queryimg = "SELECT image_file FROM product WHERE product_id=$id";
        $result = mysqli_query($mysqli, $queryimg);
        if ($row = $result->fetch_assoc()) {
            echo $row["image_file"];
        } else {
            header("location: error.php");
        }
        ?>
      </div></td></tr>
      <tr><td rowspan=12 width="34"></td></td></tr>
      <tr><td>
        <?php
        $queryname = "SELECT brand FROM product WHERE product_id=$id";
        $result = mysqli_query($mysqli, $queryname);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["brand"];
            }
        }
        ?>
      </td></tr>
      <tr><td>
        <?php
        $queryname = "SELECT name FROM product WHERE product_id=$id";
        $result = mysqli_query($mysqli, $queryname);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["name"];
            }
        }
        ?>
      </td></tr>
      <tr><td width="600">
        <?php
        $queryname = "SELECT description FROM product WHERE product_id=$id";
        $result = mysqli_query($mysqli, $queryname);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["description"];
            }
        }
        ?>
      </td></tr>
      <tr><td>
        <?php
        $queryname = "SELECT cost FROM product WHERE product_id=$id";
        $result = mysqli_query($mysqli, $queryname);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row["cost"];
                $savecost = $row["cost"];
            }
        }
        ?>
      </td></tr>
      <tr><td>
        <!--_________________Purchase button_______________-->
        <button onclick="decrement()"> - </button>
        <button onclick="increment()"> + </button>
        <form action ="cart.php" method="POST">
          <input type="number" name="quantity" id="quantity" placeholder="0" required min="1" required max="999">
          <input type='hidden' name='id' value='<?php echo "$id";?>'/>
          <input type='hidden' name='savecost' value='<?php echo "$savecost";?>'/>
          <tr><td><button name 'addtoCart' type='submit'>Add to cart</button></td></tr>
        </form>
      </td></tr>
    </tbody>
  </table>
</div>
<script>
 function decrement() {
   var dec = document.getElementById("quantity").value;
   if (dec > 0)
   dec--;
   document.getElementById("quantity").value = dec;
 }
 function increment() {
   var inc = document.getElementById("quantity").value;
   inc++;
   document.getElementById("quantity").value = inc;
 }
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
